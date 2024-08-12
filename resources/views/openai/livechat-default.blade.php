@extends('layouts.auth')
@section('title',__('Livechat'))
@section('page-header-title',__('Livechat'))
@section('page-header-details',__('Specialized AI Chat'))
@section('content')



<div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">                  
                <div class="col-lg-4 col-xl-3 col-md-6 p-1">
                    <div class="card p-0">
                        <div class="card-img mb-4 text-center">
                            <a href="{{route('default.livechat.load')}}">
                            <img class="rounded-circle mt-3" width="100px" height="100px" src="{{asset('assets/images/livechat/Default_ai_chat.png')}}" alt="{{config('app.name')}}">
                            </a>
                        </div>
                        <div class="card-body bg-white text-center">
                            <a class="text-decoration-none text-dark" href="{{route('default.livechat.load')}}">
                            <h5 class="fw-bold">{{  __('Default AI Chat')}}</h5>
                            <p class="text-muted">{{__('Default')}}</p>
                            </a>
                        </div>
                    </div>
                </div>
                @foreach($custom_prompts as $key => $value) 
                    <div class="col-lg-4 col-xl-3 col-md-6 p-1">
                        <div class="card p-0">
                            <div class="con mb-4 text-center">
                                <a href="{{route('livechat.loadcustom',$value->id)}}">
                                <img class="rounded-circle mt-3" width="100px" height="100px"  src="{{$value->custom_prompt_img ?? ''}}" alt="{{config('app.name')}}">
                                </a>
                            </div>
                            <div class="card-body bg-white text-center">
                                <a class="text-decoration-none text-dark" href="{{route('livechat.loadcustom',$value->id)}}">
                                <h5 class="fw-bold">{{$value->profile_name ?? ''}}</h5>
                                <p class="text-muted">{{__('Personal ')}}{{$value->profile_name ?? ''}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div> 

        </div>
</div>



@endsection
















