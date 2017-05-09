<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::post('doctor/create', 'DoctorController@create_doctor');
Route::match(['put', 'post'], 'doctor/{doctor_id}/edit', 'DoctorController@edit_doctor');
Route::match(['get', 'delete'], 'doctor/{doctor_id}/delete', 'DoctorController@delete_doctor');
Route::get('doctor/{doctor_id}', 'DoctorController@read_doctor');
Route::get('doctor/{doctor_id}/appointment', 'DoctorController@read_doctor_appointments');
Route::get('doctor/{doctor_id}/appointment/{appointment_id}', 'DoctorController@read_doctor_appointment');
Route::get('doctor', 'DoctorController@read_doctors');
Route::get('doctor/speciality/{speciality_id}', 'DoctorController@read_doctors_by_speciality');
Route::post('patient/create', 'PatientController@create_patient');
Route::match(['get', 'delete'], 'patient/{patient_id}/delete', 'PatientController@remove');
Route::get('patient/{patient_id}', 'PatientController@read_patient');
Route::get('patient/{patient_id}/appointment', 'PatientController@read_patient_appointments');
Route::get('patient/{patient_id}/appointment/{appointment_id}', 'PatientController@read_patient_appointment');
Route::get('patient', 'PatientController@read_patients');
Route::post('appointment/create', 'AppointmentController@create_appointment');
Route::match(['get', 'delete'], '/appointment/{appointment_id}/delete', 'AppointmentController@delete_appointment');
Route::get('appointment/{appointment_id}', 'AppointmentController@read_appointment');
Route::get('appointment', 'AppointmentController@read_appointments');
Route::get('speciality/{speciality_id}', 'SpecialityController@read_speciality');
Route::get('speciality', 'SpecialityController@read_specialities');
Route::resource('doctor', 'DoctorController');
Route::resource('patient', 'PatientController');
Route::resource('appointment', 'AppointmentController');
Route::resource('speciality', 'SpecialityController');