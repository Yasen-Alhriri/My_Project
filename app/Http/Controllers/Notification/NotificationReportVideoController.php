<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Course\ReportVideo;
use App\Models\Course\Video;
use App\Models\User\User;
use Illuminate\Http\Request;

class NotificationReportVideoController extends Controller
{
    public function report()
    {


        $reportVideo = ReportVideo::latest(
            'id_user',
            'id_video',
            'message'
        )->paginate(4);

        $count = 0;
        return view('notification.reportVideo', compact('reportVideo', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
