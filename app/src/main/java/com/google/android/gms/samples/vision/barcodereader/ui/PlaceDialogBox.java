package com.google.android.gms.samples.vision.barcodereader.ui;

import android.app.AlertDialog;
import android.app.Dialog;
import android.support.v4.app.DialogFragment;
import android.content.Context;
import android.os.Bundle;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

import com.google.android.gms.samples.vision.barcodereader.helper.SuccessToast;
import com.google.android.gms.samples.vision.barcodereader.helper.barcode.BarcodeCaptureActivity;
import com.google.android.gms.samples.vision.barcodereader.R;

import static com.google.android.gms.samples.vision.barcodereader.helper.SuccessToast.showSuccessToast;

/**
 * Created by kartik on 30/3/16.
 */


public class PlaceDialogBox extends DialogFragment {

    private Button mDestinationButton;
    private EditText mDestinationEditText;
    private TextView mScannedId;
    private String mDestination;
    private String barcodeValue;
    private AlertDialog dialog;
    private String date;
    private String time;
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        //return super.onCreateDialog(savedInstanceState);
        final Context context = getActivity();
        LayoutInflater inflater = getActivity().getLayoutInflater();
        View view = inflater.inflate(R.layout.fragment_home_out, null);

        AlertDialog.Builder builder = new AlertDialog.Builder(context)
                .setView(view);

        mScannedId = (TextView)view.findViewById(R.id.scannedIDTextView);
        mDestinationButton= (Button) view.findViewById(R.id.destinationButton);
        mDestinationEditText = (EditText) view.findViewById(R.id.destinationEditText);

        barcodeValue = getArguments().getString("Entry");
        date = getArguments().getString("date");
        time = getArguments().getString("time");
        String pattern = "^2{1}0{1}[0-9]{1}[0-9]{1}[a-zA-Z]{3}1{1}[0-9]{3}$";

        // Create a Pattern object
        Pattern r = Pattern.compile(pattern);

        // Now create matcher object.
        Matcher m = r.matcher(barcodeValue);
        if (m.find()){
            mScannedId.setText("ID : "+barcodeValue);
            mDestinationButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    mDestination = mDestinationEditText.getText().toString();
                    BarcodeCaptureActivity.getInstance().insert(barcodeValue, date, time, mDestination);
                    //showSuccessToast(getContext(),getActivity());
                    showCustomAlert();
                    dismiss();


                }
            });





            AlertDialog dialog = builder.create();
            return dialog;
        }
        else{
            mScannedId.setText("   INVALID ID! ");
            mScannedId.setTextSize(getResources().getDimension(R.dimen.invalid_font_size));

            mDestinationEditText.setVisibility(View.INVISIBLE);
            mDestinationButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                   // mDestination = mDestinationEditText.getText().toString();
                    //BarcodeCaptureActivity.getInstance().insert(barcodeValue, date, time, mDestination);
                    dismiss();


                }
            });





            AlertDialog dialog = builder.create();
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

        int dialogWidth = getResources().getDimensionPixelSize(R.dimen.fragment_place_width); // specify a value here
        int dialogHeight = getResources().getDimensionPixelSize(R.dimen.fragment_place_height); // specify a value here

        getDialog().getWindow().setLayout(dialogWidth, dialogHeight);

        // ... other stuff you want to do in your onStart() method
    }


    public void showCustomAlert()
    {

        Context context = getContext();
        // Create layout inflator object to inflate toast.xml file
        LayoutInflater inflater = getActivity().getLayoutInflater();

        // Call toast.xml file for toast layout
        View toastRoot = inflater.inflate(R.layout.layout_toast, null);

        Toast toast = new Toast(context);

        // Set layout to toast
        toast.setView(toastRoot);
        toast.setGravity(Gravity.CENTER_HORIZONTAL , 0, 0);
        toast.setDuration(Toast.LENGTH_LONG);
        toast.show();

    }
}