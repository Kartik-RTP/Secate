package com.google.android.gms.samples.vision.barcodereader.model;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;

public class StudentsDataSource {
    private SQLiteDatabase database;
    private MySQLiteHelper dbHelper;
    private static final String TABLE_NAME = "in_out_table";
    public StudentsDataSource(Context context) {
        dbHelper = new MySQLiteHelper(context);
    }

    public void open() throws SQLException {
        database = dbHelper.getWritableDatabase();
    }

    public void close() {
        dbHelper.close();
    }

    public void create_entry(String entry,String date,String time,String place) {
        ContentValues cv = new ContentValues();
        cv.put("entry_no", entry);
        cv.put("date", date);
        cv.put("time", time);
        cv.put("place", place);

        database.insert("in_out_table", null, cv);
    }

    public int delete_entry(int ti){

       return database.delete(MySQLiteHelper.TABLE_NAME, MySQLiteHelper.COLUMN_ID
                + " = " + ti, null);


    }

    public Cursor view_entry() {

        String arr = null;
        String ss[] = null;
        Cursor c = database.rawQuery("select * from in_out_table ", null);

        return c;
    }
}
