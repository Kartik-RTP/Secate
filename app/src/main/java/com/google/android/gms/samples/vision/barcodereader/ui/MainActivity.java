/*
 * Copyright (C) The Android Open Source Project
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
package com.google.android.gms.samples.vision.barcodereader.ui;
import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.app.Activity;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;

import com.google.android.gms.samples.vision.barcodereader.R;
import com.google.android.gms.samples.vision.barcodereader.helper.barcode.BarcodeCaptureActivity;
import com.google.android.gms.samples.vision.barcodereader.helper.service.AlarmTask;
import com.google.android.gms.samples.vision.barcodereader.helper.service.BackgroundService;


/**
 * Main activity demonstrating how to pass extra parameters to an activity that
 * reads barcodes.
 */

public class MainActivity extends Activity {//implements View.OnClickListener {

    // use a compound button so either checkbox or switch widgets work.
    private Button mRegularScanButton;
    private Button mHomeScanButton;

    private CompoundButton autoFocus;
    private CompoundButton useFlash;
    private static final int RC_BARCODE_CAPTURE = 9001;
    private static final String TAG = "BarcodeMain";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mRegularScanButton = (Button)findViewById(R.id.regularButton);
        mHomeScanButton = (Button)findViewById(R.id.homeButton);




        mRegularScanButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this,BarcodeCaptureActivity.class);
                intent.putExtra(getString(R.string.scan_mode),"regularScan");
//                intent.putExtra(BarcodeCaptureActivity.AutoFocus, autoFocus.isChecked());
                startActivity(intent);
            }
        });


        mHomeScanButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this,HomeActivity.class);
                startActivity(intent);
            }
        });
        scheduleAlarm();
        //autoFocus = (CompoundButton) findViewById(R.id.auto_focus);


    }


    public void scheduleAlarm(){
        Intent intent = new Intent(getApplicationContext(), AlarmTask.class);
        // Create a PendingIntent to be triggered when the alarm goes off
        final PendingIntent pIntent = PendingIntent.getBroadcast(this, AlarmTask.REQUEST_CODE,
                intent, PendingIntent.FLAG_UPDATE_CURRENT);
        // Setup periodic alarm every 5 seconds
        long firstMillis = System.currentTimeMillis(); // alarm is set right away
        AlarmManager alarm = (AlarmManager) this.getSystemService(Context.ALARM_SERVICE);

        // First parameter is the type: ELAPSED_REALTIME, ELAPSED_REALTIME_WAKEUP, RTC_WAKEUP
        // Interval can be INTERVAL_FIFTEEN_MINUTES, INTERVAL_HALF_HOUR, INTERVAL_HOUR, INTERVAL_DAY

        alarm.setInexactRepeating(AlarmManager.RTC_WAKEUP, firstMillis,
                AlarmManager.INTERVAL_FIFTEEN_MINUTES, pIntent);
    }


    public void launchBackgroundService(){
        Intent intent = new Intent(MainActivity.this,BackgroundService.class);
        startService(intent);
    }



    /**
     * Called when a view has been clicked.
     *
     * @param v The view that was clicked.
     */
    /*@Override
    public void onClick(View v) {

        if (v.getId() == R.id.button1) {
            // launch barcode activity.
            Intent intent = new Intent(this, BarcodeCaptureActivity.class);
            //intent.putExtra(BarcodeCaptureActivity.AutoFocus, autoFocus.isChecked());
            intent.putExtra(BarcodeCaptureActivity.UseFlash, useFlash.isChecked());

            startActivityForResult(intent, RC_BARCODE_CAPTURE);
        }
        if (v.getId()==R.id.button2){
            Intent intent = new Intent(this,HomeActivity.class);
            startActivity(intent);
        }
    }
*/


    /**
     * Called when an activity you launched exits, giving you the requestCode
     * you started it with, the resultCode it returned, and any additional
     * data from it.  The <var>resultCode</var> will be
     * {@link #RESULT_CANCELED} if the activity explicitly returned that,
     * didn't return any result, or crashed during its operation.
     * <p/>
     * <p>You will receive this call immediately before onResume() when your
     * activity is re-starting.
     * <p/>
     *
     * @param requestCode The integer request code originally supplied to
     *                    startActivityForResult(), allowing you to identify who this
     *                    result came from.
     * @param resultCode  The integer result code returned by the child activity
     *                    through its setResult().
     * @param data        An Intent, which can return result data to the caller
     *                    (various data can be attached to Intent "extras").
     * @see #startActivityForResult
     * @see #createPendingResult
     * @see #setResult(int)
     */

}
