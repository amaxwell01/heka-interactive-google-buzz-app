<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * This class can be used to automatically create a wrapper class for Google API end points
 * Using wrapper classes allows the IDE to auto complete function names and offer suggestions for parameters
 * making the API simpler to use.
 *
 * The generated wrapper class calls the api client's overloader function (__call) directly, so the behaviour
 * is identical to calling the long for functions directly
 *
 * @author Chris Chabot <chabotc@google.com>
 *
 */
class apiGenerator extends apiClient {

  private $discoveryUrl;
  private $discoveryVersion = '0.1';
  private $serviceName;
  private $version;

  public function __construct($serviceName, $version) {
    parent::__construct();
    $this->serviceName = $serviceName;
    $this->version = $version;
    $this->discoveryUrl = 'http://www.googleapis.com/discovery/' . $this->discoveryVersion . '/describe?api=' . urlencode($this->serviceName) . '&apiVersion=' . urlencode($this->version);
  }

  public function generate() {
    $discoveryDocument = $this->getService();
    if (!isset($discoveryDocument['data'][$this->serviceName][$this->version])) {
      throw new apiException("Invalid service name or version number");
    }
    $discoveryDocument = $discoveryDocument['data'][$this->serviceName][$this->version];
    $discoveryResources = $discoveryDocument['resources'];
    $ret = $this->licenseHeader() .
           "\n\n/**\n".
           " * The " . ucfirst($this->serviceName) . " service implementation\n".
           " *\n".
           " * Generated by http://code.google.com/p/google-api-php-client/\n".
           " * Generated from: {$this->discoveryUrl}\n" .
           " **/\n" .
    	  "class api" . ucfirst($this->serviceName) . "Service {\n\n";
    $vars = "  // Variables that the apiServiceResource implementation depends on\n" .
            "  private \$serviceName = '{$this->serviceName}';\n".
            "  private \$version = '{$this->version}';\n".
            "  private \$baseUrl = '{$discoveryDocument['baseUrl']}';\n".
            "  private \$io;\n".
            "  // apiServiceResource's that are used internally\n";
    $constructor = "  /**\n" .
                   "   * Constructs the internal service representations and does the auto-magic configuration required to drive them\n" .
                   "   */\n" .
                   "  public function __construct(apiClient \$apiClient) {\n" .
                   "    \$apiClient->addService('" . $this->serviceName . "', '" . $this->version . "');\n".
                   "    \$this->io = \$apiClient->getIo();\n";
    $functions = '';
    foreach ($discoveryResources as $resourceName => $resourceConfig) {
      $vars .= "  private \${$resourceName};\n";
      $constructor .= "    \$this->{$resourceName} = new apiServiceResource(\$this, \$this->serviceName, '$resourceName', json_decode('". json_encode($resourceConfig). "', true));\n";

      foreach ($resourceConfig['methods'] as $methodName => $methodConfig) {
        $requiredParams = $optionalParams = array();
        if (isset($methodConfig['parameters'])) {
          foreach ($methodConfig['parameters'] as $paramName => $paramConfig) {
            if ($paramName == 'alt') {
              // the library depends on everything being json so we can't change the format (alt) parameter
              continue;
            }
            $paramName = str_replace('-', '_', $paramName);
            if (isset($paramConfig['required']) && $paramConfig['required']) {
              $requiredParams[] = "\$$paramName";
            } else {
              $optionalParams[] = "\$$paramName = null";
            }
          }
        }
        if (strtoupper($methodConfig['httpMethod']) == 'POST' || strtoupper($methodConfig['httpMethod']) == 'PUT') {
          $requiredParams[] = '$postBody';
        }
        $params = array_merge($requiredParams, $optionalParams);

        $functions .= "  /**\n".
        		      "   * Implementation of the {$methodConfig['rpcName']} method.\n".
                      "   * See: http://code.google.com/apis/buzz/v1/using_rest.html#{$methodConfig['rpcName']}\n   *\n";
        $paramToArrayMapping = array();
        foreach ($params as $param) {
          $paramName = str_replace('$', '', str_replace(' = null', '', $param));
          $functions .= "   * @param \$$paramName " . (in_array($param, $requiredParams) ? "required" : "optional") . "\n";
          $paramToArrayMapping[] = "'". str_replace('_', '-', $paramName) . "' => \${$paramName}";

        }
        $functions .= "   */\n";
        $functions .= "  public function {$methodName}" . ucfirst($resourceName) . "(".
                      implode(', ', $params).
                      ") {\n".
                      "    return \$this->{$resourceName}->__call('$methodName', array(array(" . implode(', ', $paramToArrayMapping) . ')));' . "\n" .
        			  "  }\n\n";
      }
    }
    $constructor .= "  }\n\n";
    // Construct the class code in the correct order
    $ret .= $vars . "\n" .
           $constructor .
           $functions .
           $this->miscFunctions() .
           "\n}\n\n"; // End of class
    return $ret;
  }

  private function getService() {
    $request = $this->io->makeRequest(new apiHttpRequest($this->discoveryUrl));
    if ($request->getResponseHttpCode() != 200) {
      throw new apiException("Could not fetch discovery document for {$this->serviceName}, http code: " . $request->getResponseHttpCode() . ", response body: " . $request->getResponseBody());
    }
    $discoveryResponse = $request->getResponseBody();
    if (($discoveryDocument = json_decode($discoveryResponse, true)) == null) {
      throw new apiException("Invalid discovery document json");
    }
    return $discoveryDocument;
  }

  private function miscFunctions() {
    return
"  /**
   * @return the \$io
   */
  public function getIo() {
    return \$this->io;
  }

  /**
   * @param \$io the \$io to set
   */
  public function setIo(\$io) {
    \$this->io = \$io;
  }

  /**
   * @return the \$version
   */
  public function getVersion() {
    return \$this->version;
  }

  /**
   * @return the \$baseUrl
   */
  public function getBaseUrl() {
    return \$this->baseUrl;
  }

  /**
   * @param \$version the \$version to set
   */
  public function setVersion(\$version) {
    \$this->version = \$version;
  }

  /**
   * @param \$baseUrl the \$baseUrl to set
   */
  public function setBaseUrl(\$baseUrl) {
    \$this->baseUrl = \$baseUrl;
  }
    ";
  }

  private function licenseHeader() {
    return
"/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the \"License\");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an \"AS IS\" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */";
  }

}
