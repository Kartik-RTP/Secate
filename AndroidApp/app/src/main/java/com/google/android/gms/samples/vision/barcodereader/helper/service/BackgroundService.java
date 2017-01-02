package com.google.android.gms.samples.vision.barcodereader.helper.service;

import android.app.IntentService;
import android.content.Intent;
import android.database.Cursor;
import android.support.v4.content.WakefulBroadcastReceiver;
import android.util.Log;

import com.google.android.gms.samples.vision.barcodereader.model.StudentsDataSource;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

/**
 * Created by Rahul on 03-04-2016.
 */

public class BackgroundService extends IntentService {
    private StudentsDataSource datasource;
    public static final String TAG = "YOUR-TAG-NAME";
    public BackgroundService(){
        super("test-service");
    }

    @Override
    public void onCreate() {
        // if you override onCreate(), make sure to call super().
        // If a Context object is needed, call getApplicationContext() here.
        super.onCreate();
        datasource = new StudentsDataSource(this);
        datasource.open();

    }

    @Override
    protected void onHandleIntent(Intent intent) {
        // This describes what will happen when service is triggered
        int i=0;
        String s = "";
        Cursor c = datasource.view_entry();
        String id[] = new String[c.getCount()];
        String dt[] = new String[c.getCount()];
        String ti[] = new String[c.getCount()];
        String pl[] = new String[c.getCount()];

        if (c != null && c.getCount() > 0) {
            c.moveToFirst();
            do {int a= c.getInt(c.getColumnIndex("_id"));
                id[i] = c.getString(c.getColumnIndex("entry_no"));
                dt[i] = c.getString(c.getColumnIndex("date"));
                ti[i] = c.getString(c.getColumnIndex("time"));
                pl[i] = c.getString(c.getColumnIndex("place"));

                // Send data to online database
                StringBuffer chaine = new StringBuffer("");
                String POST_PARAMS = "entry_no=" + id[i] + "&date=" + dt[i] +"&time="+ ti[i]+  "&place=" + pl[i];
                Log.i(TAG,"post_params: "+ POST_PARAMS );
                URL obj = null;
                HttpURLConnection con = null;
                try {

                    obj = new URL("http://www.k2infosys.co.in/BzLogic.php");
                    con = (HttpURLConnection) obj.openConnection();
                    con.setRequestMethod("POST");

                    // For POST only - BEGIN
                    con.setDoOutput(true);
                    OutputStream os = con.getOutputStream();
                    os.write(POST_PARAMS.getBytes());
                    os.flush();
                    os.close();
                    // For POST only - END

                    int responseCode = con.getResponseCode();
                    Log.i(TAG, "POST Response Code :: " + responseCode);

                    if (responseCode == HttpURLConnection.HTTP_OK) { //success
                        BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
                        String inputLine;
                        StringBuffer response = new StringBuffer();

                        while ((inputLine = in.readLine()) != null) {
                            response.append(inputLine);
                        }
                        in.close();

                        // print result
                        int abc=  datasource.delete_entry(a);
                        Log.i(TAG,"deleted "+ abc);
                        Log.i(TAG, response.toString());
                    } else {
                        Log.i(TAG, "POST request did not work.");
                    }
                }

                catch (Exception e) {
                    e.printStackTrace();

                }

                // delete from sqlite database
              
                i++;

            } while (c.moveToNext());

            c.close();

        }

        WakefulBroadcastReceiver.completeWakefulIntent(intent);
    }

}
