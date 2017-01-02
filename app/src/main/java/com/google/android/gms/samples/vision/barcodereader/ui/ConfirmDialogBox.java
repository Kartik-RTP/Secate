package com.google.android.gms.samples.vision.barcodereader.ui;

import android.app.AlertDialog;
import android.app.Dialog;
import android.support.v4.app.DialogFragment;
import android.content.Context;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.google.android.gms.samples.vision.barcodereader.R;
import com.google.android.gms.samples.vision.barcodereader.helper.barcode.BarcodeCaptureActivity;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * Created by kartik on 28/3/16.
 */

public class ConfirmDialogBox extends DialogFragment {
    private String barcodeValue;
    private AlertDialog dialog;
    private String date;
    private String time;
    private Button mOkButton;
    private TextView mScannedId;
    /*
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        barcodeValue = getArguments().getString("Entry");
        date = getArguments().getString("date");
        time = getArguments().getString("time");
    }*/

    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        //return super.onCreateDialog(savedInstanceState);

            final Context context = getActivity();
            LayoutInflater inflater = getActivity().getLayoutInflater();
            View view = inflater.inflate(R.layout.fragment_regular_home_in, null);
            barcodeValue = getArguments().getString("Entry");
            date = getArguments().getString("date");
            time = getArguments().getString("time");
            String pattern = "^2{1}0{1}[0-9]{1}[0-9]{1}[a-zA-Z]{3}1{1}[0-9]{3}$";

            // Create a Pattern object
            Pattern r = Pattern.compile(pattern);

            // Now create matcher object.
            Matcher m = r.matcher(barcodeValue);
        if (m.find( )) {


            AlertDialog.Builder builder = new AlertDialog.Builder(context)
                    // .setTitle(barcodeValue)
                    //.setMessage("REGULAR/HOMEIN")
                    .setView(view);
            mScannedId = (TextView) view.findViewById(R.id.ScannedIDTextView2);
            mOkButton = (Button) view.findViewById(R.id.okButton);

            mScannedId.setText("  ID : " + barcodeValue);
            mOkButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    BarcodeCaptureActivity.getInstance().insert(barcodeValue, date, time, "null");
                    dismiss();

                }
            });

            dialog = builder.create();


            return dialog;
        }
        else{
            AlertDialog.Builder builder = new AlertDialog.Builder(context)
                    // .setTitle(barcodeValue)
                    //.setMessage("REGULAR/HOMEIN")
                    .setView(view);
            mScannedId = (TextView) view.findViewById(R.id.ScannedIDTextView2);
            mOkButton = (Button) view.findViewById(R.id.okButton);

            mScannedId.setText("   INVALID ID! ");
            mScannedId.setTextSize(getResources().getDimension(R.dimen.invalid_font_size));
            mOkButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    //BarcodeCaptureActivity.getInstance().insert(barcodeValue, date, time, "null");
                    dismiss();

                }
            });

            dialog = builder.create();
            return dialog;
        }
    }

    @Override
    public void onStart() {
        super.onStart();
        // safety check
        if (getDialog() == null) {
            return;
        }
        //getDialog().getWindow().requestFeature(Window.FEATURE_NO_TITLE);

        int dialogWidth = getResources().getDimensionPixelSize(R.dimen.fragment_ok_width); // specify a value here
        int dialogHeight = getResources().getDimensionPixelSize(R.dimen.fragment_ok_height); // specify a value here

        getDialog().getWindow().setLayout(dialogWidth, dialogHeight);

        // ... other stuff you want to do in your onStart() method
    }

}

