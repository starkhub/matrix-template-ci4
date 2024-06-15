<?php

if (!function_exists('get_global_param')) {
    function get_global_param($param_name)
    {
        $model = new \App\Models\ConfigModel();
        $param = $model->where('param_name', $param_name)->first();
        return $param ? $param['param_value'] : null;
    }

    function get_application_title()
    {
        $model = new \App\Models\ConfigModel();
        $param = $model->where('param_name', 'application_name')->first();
        return $param ? $param['param_value'] : 'Mon application';
    }
}
