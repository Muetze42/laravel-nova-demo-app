@extends('errors::illustrated-layout')

@section('title', __('Maintenance Mode'))
@section('code', '503')
@section('message', (__("Short maintenance for a update.\nWe'll be right back in in a few minutes.")))
