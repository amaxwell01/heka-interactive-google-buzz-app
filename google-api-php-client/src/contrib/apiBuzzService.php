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
 * The Buzz service implementation
 *
 * Generated by http://code.google.com/p/google-api-php-client/
 * Generated from: http://www.googleapis.com/discovery/0.1/describe?api=buzz&apiVersion=v1
 **/
class apiBuzzService {

  // Variables that the apiServiceResource implementation depends on
  private $serviceName = 'buzz';
  private $version = 'v1';
  private $baseUrl = 'https://www.googleapis.com/';
  private $io;
  // apiServiceResource's that are used internally
  private $photos;
  private $feeds;
  private $activities;
  private $people;
  private $groups;
  private $comments;
  private $related;

  /**
   * Constructs the internal service representations and does the auto-magic configuration required to drive them
   */
  public function __construct(apiClient $apiClient) {
    $apiClient->addService('buzz', 'v1');
    $this->io = $apiClient->getIo();
    $this->photos = new apiServiceResource($this, $this->serviceName, 'photos', json_decode('{"methods":{"insert":{"pathUrl":"buzz\/v1\/photos\/{userId}\/{albumId}","rpcName":"buzz.photos.insert","httpMethod":"POST","methodType":"rest","parameters":{"albumId":{"parameterType":"path","pattern":"[^\/]+","required":true},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}}}}', true));
    $this->feeds = new apiServiceResource($this, $this->serviceName, 'feeds', json_decode('{"methods":{"insert":{"pathUrl":"buzz\/v1\/feeds\/{userId}\/@self","rpcName":"buzz.feeds.insert","httpMethod":"POST","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"update":{"pathUrl":"buzz\/v1\/feeds\/{userId}\/@self\/{siteId}","rpcName":"buzz.feeds.update","httpMethod":"PUT","methodType":"rest","parameters":{"siteId":{"parameterType":"path","pattern":"[^\/]+","required":true},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"list":{"pathUrl":"buzz\/v1\/feeds\/{userId}\/{scope}","rpcName":"buzz.feeds.list","httpMethod":"GET","methodType":"rest","parameters":{"scope":{"parameterType":"path","pattern":"@.*","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"delete":{"pathUrl":"buzz\/v1\/feeds\/{userId}\/@self\/{siteId}","rpcName":"buzz.feeds.delete","httpMethod":"DELETE","methodType":"rest","parameters":{"siteId":{"parameterType":"path","pattern":"[^\/]+","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}}}}', true));
    $this->activities = new apiServiceResource($this, $this->serviceName, 'activities', json_decode('{"methods":{"update":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}\/{postId}","rpcName":"buzz.activities.update","httpMethod":"PUT","methodType":"rest","parameters":{"scope":{"parameterType":"path","pattern":"@.*","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false},"abuseType":{"parameterType":"query","required":false}}},"extractPeopleFromSearch":{"pathUrl":"buzz\/v1\/activities\/search\/@people","rpcName":"buzz.activities.extractPeopleFromSearch","httpMethod":"POST","methodType":"rest","parameters":{"lon":{"parameterType":"query","required":false},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"bbox":{"parameterType":"query","required":false},"q":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"pid":{"parameterType":"query","required":false},"radius":{"parameterType":"query","required":false},"lat":{"parameterType":"query","required":false},"hl":{"parameterType":"query","required":false}}},"delete":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}\/{postId}","rpcName":"buzz.activities.delete","httpMethod":"DELETE","methodType":"rest","parameters":{"scope":{"parameterType":"path","pattern":"@.*","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}},"insert":{"pathUrl":"buzz\/v1\/activities\/{userId}\/@self","rpcName":"buzz.activities.insert","httpMethod":"POST","methodType":"rest","parameters":{"preview":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"photo":{"parameterType":"query","required":false},"hl":{"parameterType":"query","required":false}}},"list":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}","rpcName":"buzz.activities.list","httpMethod":"GET","methodType":"rest","parameters":{"max-comments":{"parameterType":"query","required":false},"scope":{"parameterType":"path","pattern":"@(self|public|consumption|liked|comments)*","required":true},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"max-liked":{"parameterType":"query","required":false},"hl":{"parameterType":"query","required":false}}},"get":{"pathUrl":"buzz\/v1\/activities\/{userId}\/@self\/{postId}","rpcName":"buzz.activities.get","httpMethod":"GET","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}},"search":{"pathUrl":"buzz\/v1\/activities\/search","rpcName":"buzz.activities.search","httpMethod":"POST","methodType":"rest","parameters":{"lon":{"parameterType":"query","required":false},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"bbox":{"parameterType":"query","required":false},"q":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"pid":{"parameterType":"query","required":false},"radius":{"parameterType":"query","required":false},"lat":{"parameterType":"query","required":false},"hl":{"parameterType":"query","required":false}}}}}', true));
    $this->people = new apiServiceResource($this, $this->serviceName, 'people', json_decode('{"methods":{"get":{"pathUrl":"buzz\/v1\/people\/{userId}\/@self","rpcName":"buzz.people.get","httpMethod":"GET","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"search":{"pathUrl":"buzz\/v1\/people\/search","rpcName":"buzz.people.search","httpMethod":"POST","methodType":"rest","parameters":{"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"q":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"hl":{"parameterType":"query","required":false}}},"list":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups\/{groupId}","rpcName":"buzz.people.list","httpMethod":"GET","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"[^\/]+","required":true},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"relatedToUri":{"pathUrl":"buzz\/v1\/people\/{userId}\/@related","rpcName":"buzz.people.relatedToUri","httpMethod":"POST","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"uri":{"parameterType":"query","required":false},"hl":{"parameterType":"query","required":false}}},"reshared":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}\/{postId}\/{groupId}","rpcName":"buzz.people.reshared","httpMethod":"POST","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"@reshared","required":true},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}},"delete":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups\/{groupId}\/{personId}","rpcName":"buzz.people.delete","httpMethod":"DELETE","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"[^\/]+","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"personId":{"parameterType":"path","pattern":"(?!@self).*","required":true},"hl":{"parameterType":"query","required":false}}},"update":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups\/{groupId}\/{personId}","rpcName":"buzz.people.update","httpMethod":"PUT","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"[^\/]+","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"personId":{"parameterType":"path","pattern":"(?!@self).*","required":true},"hl":{"parameterType":"query","required":false}}},"liked":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}\/{postId}\/{groupId}","rpcName":"buzz.people.liked","httpMethod":"POST","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"@liked","required":true},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}}}}', true));
    $this->groups = new apiServiceResource($this, $this->serviceName, 'groups', json_decode('{"methods":{"get":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups\/{groupId}\/@self","rpcName":"buzz.groups.get","httpMethod":"GET","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"[^\/]+","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"list":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups","rpcName":"buzz.groups.list","httpMethod":"GET","methodType":"rest","parameters":{"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"delete":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups\/{groupId}","rpcName":"buzz.groups.delete","httpMethod":"DELETE","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"[^\/]+","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"update":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups\/{groupId}\/@self","rpcName":"buzz.groups.update","httpMethod":"PUT","methodType":"rest","parameters":{"groupId":{"parameterType":"path","pattern":"[^\/]+","required":true},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}},"insert":{"pathUrl":"buzz\/v1\/people\/{userId}\/@groups","rpcName":"buzz.groups.insert","httpMethod":"POST","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false}}}}}', true));
    $this->comments = new apiServiceResource($this, $this->serviceName, 'comments', json_decode('{"methods":{"update":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}\/{postId}\/@comments\/{commentId}","rpcName":"buzz.comments.update","httpMethod":"PUT","methodType":"rest","parameters":{"scope":{"parameterType":"path","pattern":"@.*","required":true},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"commentId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false},"abuseType":{"parameterType":"query","required":false}}},"list":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}\/{postId}\/@comments","rpcName":"buzz.comments.list","httpMethod":"GET","methodType":"rest","parameters":{"scope":{"parameterType":"path","pattern":"@.*","required":true},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}},"delete":{"pathUrl":"buzz\/v1\/activities\/{userId}\/@self\/{postId}\/@comments\/{commentId}","rpcName":"buzz.comments.delete","httpMethod":"DELETE","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"commentId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}},"insert":{"pathUrl":"buzz\/v1\/activities\/{userId}\/@self\/{postId}\/@comments","rpcName":"buzz.comments.insert","httpMethod":"POST","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}},"get":{"pathUrl":"buzz\/v1\/activities\/{userId}\/@self\/{postId}\/@comments\/{commentId}","rpcName":"buzz.comments.get","httpMethod":"GET","methodType":"rest","parameters":{"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"commentId":{"parameterType":"path","pattern":"[^\/]+","required":true},"postId":{"parameterType":"path","pattern":".*","required":true},"hl":{"parameterType":"query","required":false}}}}}', true));
    $this->related = new apiServiceResource($this, $this->serviceName, 'related', json_decode('{"methods":{"list":{"pathUrl":"buzz\/v1\/activities\/{userId}\/{scope}\/{postId}\/@related","rpcName":"buzz.related.list","httpMethod":"GET","methodType":"rest","parameters":{"scope":{"parameterType":"path","pattern":"@.*","required":true},"max-results":{"parameterType":"query","required":false},"c":{"parameterType":"query","required":false},"alt":{"parameterType":"query","required":false},"userId":{"parameterType":"path","pattern":"[^\/]+","required":true},"hl":{"parameterType":"query","required":false},"postId":{"parameterType":"path","pattern":".*","required":true}}}}}', true));
  }

  /**
   * Implementation of the buzz.photos.insert method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.photos.insert
   *
   * @param $albumId required
   * @param $userId required
   * @param $postBody required
   * @param $hl optional
   */
  public function insertPhotos($albumId, $userId, $postBody, $hl = null) {
    return $this->photos->__call('insert', array(
        array('albumId' => $albumId, 'userId' => $userId, 'postBody' => $postBody, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.feeds.insert method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.feeds.insert
   *
   * @param $userId required
   * @param $postBody required
   * @param $hl optional
   */
  public function insertFeeds($userId, $postBody, $hl = null) {
    return $this->feeds->__call('insert', array(array('userId' => $userId, 'postBody' => $postBody, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.feeds.update method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.feeds.update
   *
   * @param $siteId required
   * @param $userId required
   * @param $postBody required
   * @param $max_results optional
   * @param $c optional
   * @param $hl optional
   */
  public function updateFeeds($siteId, $userId, $postBody, $max_results = null, $c = null, $hl = null) {
    return $this->feeds->__call('update', array(
        array('siteId' => $siteId, 'userId' => $userId, 'postBody' => $postBody, 'max-results' => $max_results,
            'c' => $c, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.feeds.list method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.feeds.list
   *
   * @param $scope required
   * @param $userId required
   * @param $hl optional
   */
  public function listFeeds($scope, $userId, $hl = null) {
    return $this->feeds->__call('list', array(array('scope' => $scope, 'userId' => $userId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.feeds.delete method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.feeds.delete
   *
   * @param $siteId required
   * @param $userId required
   * @param $hl optional
   */
  public function deleteFeeds($siteId, $userId, $hl = null) {
    return $this->feeds->__call('delete', array(array('siteId' => $siteId, 'userId' => $userId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.activities.update method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.activities.update
   *
   * @param $scope required
   * @param $userId required
   * @param $postId required
   * @param $postBody required
   * @param $hl optional
   * @param $abuseType optional
   */
  public function updateActivities($scope, $userId, $postId, $postBody, $hl = null, $abuseType = null) {
    return $this->activities->__call('update', array(
        array('scope' => $scope, 'userId' => $userId, 'postId' => $postId, 'postBody' => $postBody, 'hl' => $hl,
            'abuseType' => $abuseType)));
  }

  /**
   * Implementation of the buzz.activities.extractPeopleFromSearch method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.activities.extractPeopleFromSearch
   *
   * @param $postBody required
   * @param $lon optional
   * @param $max_results optional
   * @param $c optional
   * @param $bbox optional
   * @param $q optional
   * @param $pid optional
   * @param $radius optional
   * @param $lat optional
   * @param $hl optional
   */
  public function extractPeopleFromSearchActivities($postBody, $lon = null, $max_results = null, $c = null, $bbox = null, $q = null, $pid = null, $radius = null, $lat = null, $hl = null) {
    return $this->activities->__call('extractPeopleFromSearch', array(
        array('postBody' => $postBody, 'lon' => $lon, 'max-results' => $max_results, 'c' => $c, 'bbox' => $bbox,
            'q' => $q, 'pid' => $pid, 'radius' => $radius, 'lat' => $lat, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.activities.delete method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.activities.delete
   *
   * @param $scope required
   * @param $userId required
   * @param $postId required
   * @param $hl optional
   */
  public function deleteActivities($scope, $userId, $postId, $hl = null) {
    return $this->activities->__call('delete', array(
        array('scope' => $scope, 'userId' => $userId, 'postId' => $postId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.activities.insert method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.activities.insert
   *
   * @param $userId required
   * @param $postBody required
   * @param $preview optional
   * @param $photo optional
   * @param $hl optional
   */
  public function insertActivities($userId, $postBody, $preview = null, $photo = null, $hl = null) {
    return $this->activities->__call('insert', array(
        array('userId' => $userId, 'postBody' => $postBody, 'preview' => $preview, 'photo' => $photo, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.activities.list method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.activities.list
   *
   * @param $scope required
   * @param $userId required
   * @param $max_comments optional
   * @param $max_results optional
   * @param $c optional
   * @param $max_liked optional
   * @param $hl optional
   */
  public function listActivities($scope, $userId, $max_comments = null, $max_results = null, $c = null, $max_liked = null, $hl = null) {
    return $this->activities->__call('list', array(
        array('scope' => $scope, 'userId' => $userId, 'max-comments' => $max_comments, 'max-results' => $max_results,
            'c' => $c, 'max-liked' => $max_liked, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.activities.get method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.activities.get
   *
   * @param $userId required
   * @param $postId required
   * @param $hl optional
   */
  public function getActivities($userId, $postId, $hl = null) {
    return $this->activities->__call('get', array(array('userId' => $userId, 'postId' => $postId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.activities.search method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.activities.search
   *
   * @param $postBody required
   * @param $lon optional
   * @param $max_results optional
   * @param $c optional
   * @param $bbox optional
   * @param $q optional
   * @param $pid optional
   * @param $radius optional
   * @param $lat optional
   * @param $hl optional
   */
  public function searchActivities($postBody, $lon = null, $max_results = null, $c = null, $bbox = null, $q = null, $pid = null, $radius = null, $lat = null, $hl = null) {
    return $this->activities->__call('search', array(
        array('postBody' => $postBody, 'lon' => $lon, 'max-results' => $max_results, 'c' => $c, 'bbox' => $bbox,
            'q' => $q, 'pid' => $pid, 'radius' => $radius, 'lat' => $lat, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.get method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.get
   *
   * @param $userId required
   * @param $hl optional
   */
  public function getPeople($userId, $hl = null) {
    return $this->people->__call('get', array(array('userId' => $userId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.search method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.search
   *
   * @param $postBody required
   * @param $max_results optional
   * @param $c optional
   * @param $q optional
   * @param $hl optional
   */
  public function searchPeople($postBody, $max_results = null, $c = null, $q = null, $hl = null) {
    return $this->people->__call('search', array(
        array('postBody' => $postBody, 'max-results' => $max_results, 'c' => $c, 'q' => $q, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.list method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.list
   *
   * @param $groupId required
   * @param $userId required
   * @param $max_results optional
   * @param $c optional
   * @param $hl optional
   */
  public function listPeople($groupId, $userId, $max_results = null, $c = null, $hl = null) {
    return $this->people->__call('list', array(
        array('groupId' => $groupId, 'userId' => $userId, 'max-results' => $max_results, 'c' => $c, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.relatedToUri method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.relatedToUri
   *
   * @param $postBody required
   * @param $uri optional
   * @param $hl optional
   */
  public function relatedToUriPeople($postBody, $uri = null, $hl = null) {
    return $this->people->__call('relatedToUri', array(array('postBody' => $postBody, 'uri' => $uri, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.reshared method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.reshared
   *
   * @param $groupId required
   * @param $userId required
   * @param $postId required
   * @param $postBody required
   * @param $max_results optional
   * @param $c optional
   * @param $hl optional
   */
  public function resharedPeople($groupId, $userId, $postId, $postBody, $max_results = null, $c = null, $hl = null) {
    return $this->people->__call('reshared', array(
        array('groupId' => $groupId, 'userId' => $userId, 'postId' => $postId, 'postBody' => $postBody,
            'max-results' => $max_results, 'c' => $c, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.delete method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.delete
   *
   * @param $groupId required
   * @param $userId required
   * @param $personId required
   * @param $hl optional
   */
  public function deletePeople($groupId, $userId, $personId, $hl = null) {
    return $this->people->__call('delete', array(
        array('groupId' => $groupId, 'userId' => $userId, 'personId' => $personId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.update method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.update
   *
   * @param $groupId required
   * @param $userId required
   * @param $personId required
   * @param $postBody required
   * @param $hl optional
   */
  public function updatePeople($groupId, $userId, $personId, $postBody, $hl = null) {
    return $this->people->__call('update', array(
        array('groupId' => $groupId, 'userId' => $userId, 'personId' => $personId, 'postBody' => $postBody, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.people.liked method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.people.liked
   *
   * @param $groupId required
   * @param $userId required
   * @param $postId required
   * @param $postBody required
   * @param $max_results optional
   * @param $c optional
   * @param $hl optional
   */
  public function likedPeople($groupId, $userId, $postId, $postBody, $max_results = null, $c = null, $hl = null) {
    return $this->people->__call('liked', array(
        array('groupId' => $groupId, 'userId' => $userId, 'postId' => $postId, 'postBody' => $postBody,
            'max-results' => $max_results, 'c' => $c, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.groups.get method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.groups.get
   *
   * @param $groupId required
   * @param $userId required
   * @param $hl optional
   */
  public function getGroups($groupId, $userId, $hl = null) {
    return $this->groups->__call('get', array(array('groupId' => $groupId, 'userId' => $userId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.groups.list method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.groups.list
   *
   * @param $userId required
   * @param $max_results optional
   * @param $c optional
   * @param $hl optional
   */
  public function listGroups($userId, $max_results = null, $c = null, $hl = null) {
    return $this->groups->__call('list', array(
        array('userId' => $userId, 'max-results' => $max_results, 'c' => $c, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.groups.delete method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.groups.delete
   *
   * @param $groupId required
   * @param $userId required
   * @param $hl optional
   */
  public function deleteGroups($groupId, $userId, $hl = null) {
    return $this->groups->__call('delete', array(array('groupId' => $groupId, 'userId' => $userId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.groups.update method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.groups.update
   *
   * @param $groupId required
   * @param $userId required
   * @param $postBody required
   * @param $hl optional
   */
  public function updateGroups($groupId, $userId, $postBody, $hl = null) {
    return $this->groups->__call('update', array(
        array('groupId' => $groupId, 'userId' => $userId, 'postBody' => $postBody, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.groups.insert method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.groups.insert
   *
   * @param $userId required
   * @param $postBody required
   * @param $hl optional
   */
  public function insertGroups($userId, $postBody, $hl = null) {
    return $this->groups->__call('insert', array(array('userId' => $userId, 'postBody' => $postBody, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.comments.update method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.comments.update
   *
   * @param $scope required
   * @param $userId required
   * @param $commentId required
   * @param $postId required
   * @param $postBody required
   * @param $hl optional
   * @param $abuseType optional
   */
  public function updateComments($scope, $userId, $commentId, $postId, $postBody, $hl = null, $abuseType = null) {
    return $this->comments->__call('update', array(
        array('scope' => $scope, 'userId' => $userId, 'commentId' => $commentId, 'postId' => $postId,
            'postBody' => $postBody, 'hl' => $hl, 'abuseType' => $abuseType)));
  }

  /**
   * Implementation of the buzz.comments.list method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.comments.list
   *
   * @param $scope required
   * @param $userId required
   * @param $postId required
   * @param $max_results optional
   * @param $c optional
   * @param $hl optional
   */
  public function listComments($scope, $userId, $postId, $max_results = null, $c = null, $hl = null) {
    return $this->comments->__call('list', array(
        array('scope' => $scope, 'userId' => $userId, 'postId' => $postId, 'max-results' => $max_results, 'c' => $c,
            'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.comments.delete method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.comments.delete
   *
   * @param $userId required
   * @param $commentId required
   * @param $postId required
   * @param $hl optional
   */
  public function deleteComments($userId, $commentId, $postId, $hl = null) {
    return $this->comments->__call('delete', array(
        array('userId' => $userId, 'commentId' => $commentId, 'postId' => $postId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.comments.insert method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.comments.insert
   *
   * @param $userId required
   * @param $postId required
   * @param $postBody required
   * @param $hl optional
   */
  public function insertComments($userId, $postId, $postBody, $hl = null) {
    return $this->comments->__call('insert', array(
        array('userId' => $userId, 'postId' => $postId, 'postBody' => $postBody, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.comments.get method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.comments.get
   *
   * @param $userId required
   * @param $commentId required
   * @param $postId required
   * @param $hl optional
   */
  public function getComments($userId, $commentId, $postId, $hl = null) {
    return $this->comments->__call('get', array(
        array('userId' => $userId, 'commentId' => $commentId, 'postId' => $postId, 'hl' => $hl)));
  }

  /**
   * Implementation of the buzz.related.list method.
   * See: http://code.google.com/apis/buzz/v1/using_rest.html#buzz.related.list
   *
   * @param $scope required
   * @param $userId required
   * @param $postId required
   * @param $max_results optional
   * @param $c optional
   * @param $hl optional
   */
  public function listRelated($scope, $userId, $postId, $max_results = null, $c = null, $hl = null) {
    return $this->related->__call('list', array(
        array('scope' => $scope, 'userId' => $userId, 'postId' => $postId, 'max-results' => $max_results, 'c' => $c,
            'hl' => $hl)));
  }

  /**
   * @return the $io
   */
  public function getIo() {
    return $this->io;
  }

  /**
   * @param $io the $io to set
   */
  public function setIo($io) {
    $this->io = $io;
  }

  /**
   * @return the $version
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @return the $baseUrl
   */
  public function getBaseUrl() {
    return $this->baseUrl;
  }

  /**
   * @param $version the $version to set
   */
  public function setVersion($version) {
    $this->version = $version;
  }

  /**
   * @param $baseUrl the $baseUrl to set
   */
  public function setBaseUrl($baseUrl) {
    $this->baseUrl = $baseUrl;
  }

}

