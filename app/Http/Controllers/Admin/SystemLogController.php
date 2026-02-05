<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\AdminController;
use Illuminate\Support\Str;

class SystemLogController extends AdminController
{
    public function index()
    {
        $this->data['title'] = 'System Logs';
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'System Logs' => false,
        ];

        $logPath = storage_path('logs/laravel.log');
        $this->data['log_path'] = $logPath;
        $this->data['log_exists'] = file_exists($logPath);
        $this->data['log_content'] = '';

        if ($this->data['log_exists']) {
            $content = file_get_contents($logPath);
            $this->data['log_content'] = Str::of($content)->explode("\n")->take(-500)->implode("\n");
        }

        return view('vendor.backpack.base.system-logs', $this->data);
    }
}
