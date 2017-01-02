package com.google.android.gms.samples.vision.barcodereader.model;
import android.os.AsyncTask;
import android.util.Log;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class InsertEntry extends AsyncTask<String,Void,String> {
    public static final String TAG = "YOUR-TAG-NAME";

    @Override
    protected String doInBackground(String... values) {
        String s = "";
        StringBuffer chaine = new StringBuffer("");
        String POST_PARAMS = "entry_no=" + values[0] + "&time_out=" + values[1] +"&date_out="+ values[2]+ "&time_in=" + values[3]+ "&date_in=" + values[4];
        System.out.print(values[0]);
        URL obj = null;
        HttpURLConnection con = null;
        try {

            obj = new URL("http://www.k2infosys.co.in/first.php");
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
                Log.i(TAG, response.toString());
            } else {
                Log.i(TAG, "POST request did not work.");
            }
        }
        catch (Exception e) {
            e.printStackTrace();

        }
        return s;
    }


}
