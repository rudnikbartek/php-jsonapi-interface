<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:38
 */

namespace Rdnk\JsonApi;


class Status extends Value {

    // GLOBAL SYSTEM STATUSES
    CONST GLOBAL_SYSTEM_OK = 'sys_ok';
    CONST GLOBAL_SYSTEM_DURING_GENERATION = 'sys_gen_in_progress';
    CONST GLOBAL_SYSTEM_FAILURE = 'sys_error';

    // GENERATION STATUSES
    CONST GENERATION_NOT_GENERATING = 'gen_not_generating';
    CONST GENERATION_GENERATING_XML = 'gen_generating_xml';
    CONST GENERATION_GENERATING_CSV = 'gen_generating_csv';

    // API AVAILABILITY STATUS
    CONST API_NOT_AVAILABLE = 'api_not_available';
    CONST API_AVAILABLE = 'api_ok';

    public $global_system_status;
    public $generation_status;
    public $api_availability_status;

    public $application_version;
    public $application_info;
    public $application_environment;

    public $api_version = '0.511';
}