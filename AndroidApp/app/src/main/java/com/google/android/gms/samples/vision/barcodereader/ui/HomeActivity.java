package com.google.android.gms.samples.vision.barcodereader.ui;

import android.content.Intent;
import android.os.Bundle;
import android.app.Activity;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;

import com.google.android.gms.samples.vision.barcodereader.R;
import com.google.android.gms.samples.vision.barcodereader.helper.barcode.BarcodeCaptureActivity;


public class HomeActivity extends Activity {

    private Button mHomeIn;
    private Button mHomeOut;
    private CompoundButton autoFocus;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        mHomeIn = (Button) findViewById(R.id.homeIn);
        mHomeOut = (Button) findViewById(R.id.homeOut);

        mHomeIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startScan("HomeIn");
            }
        });

        mHomeOut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startScan("HomeOut");
            }
        });




    }

    private void startScan(String scanMode) {
        Intent intent = new Intent(this,BarcodeCaptureActivity.class);
        intent.putExtra(getString(R.string.scan_mode),scanMode);
      //  intent.putExtra(BarcodeCaptureActivity.AutoFocus, autoFocus.isChecked());
        startActivity(intent);

    }


}
