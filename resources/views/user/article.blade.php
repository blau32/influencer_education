@extends('layouts.app')

@section('content')
  {{ $articles-> }}
  {{ $articles->title }}
  {{ $articles->content }}
@endsection