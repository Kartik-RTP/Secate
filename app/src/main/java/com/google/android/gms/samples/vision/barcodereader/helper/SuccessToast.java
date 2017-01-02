package com.google.android.gms.samples.vision.barcodereader.helper;

import android.app.Activity;
import android.content.Context;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.samples.vision.barcodereader.R;

import static android.app.PendingIntent.getActivity;

/**
 * Created by canopy on 26-04-2016.
 */
public class SuccessToast {

    public static void showSuccessToast(Context context,Activity activity ){
        //final Context context = getActivity();
        LayoutInflater inflater = activity.getLayoutInflater();
        View view = inflater.inflate(R.layout.layout_toast,
                null);

        Toast toast = new Toast(context);
        toast.setGravity(Gravity.CENTER_VERTICAL, 0, 0);
        toast.setDuration(Toast.LENGTH_LONG);
        toast.setView(view);
        toast.show();


    }
}
