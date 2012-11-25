<?php

/**
 * @file
 * Definition of Drupal\rest\ResourceResponse.
 */

namespace Drupal\rest;

use Symfony\Component\HttpFoundation\Response;

/**
 * Contains data for serialization before sending the response.
 */
class ResourceResponse extends Response {

  /**
   * Response data that should be serialized.
   *
   * @var mixed
   */
  protected $responseData;

  /**
   * Constructor for ResourceResponse objects.
   *
   * @param mixed $data
   *   Response data that should be serialized.
   * @param int $status
   *   The response status code.
   * @param array $headers
   *   An array of response headers.
   */
  public function __construct($data = NULL, $status = 200, $headers = array()) {
    $this->responseData = $data;
    parent::__construct('', $status, $headers);
  }

  /**
   * Returns response data that should be serialized.
   *
   * @return mixed
   *   Response data that should be serialized.
   */
  public function getResponseData() {
    return $this->responseData;
  }
}
