package com.google.android.gms.samples.vision.barcodereader.helper.service;

import android.content.Context;
import android.content.Intent;
import android.support.v4.content.WakefulBroadcastReceiver;

/**
 * Created by Rahul on 03-04-2016.
 */

public class BootBroadcastReceiver extends WakefulBroadcastReceiver {
    @Override
    public void onReceive(Context context, Intent intent) {
        // Launch the specified service when this message is received
        Intent startServiceIntent = new Intent(context, BackgroundService.class);
        startWakefulService(context, startServiceIntent);
    }
}