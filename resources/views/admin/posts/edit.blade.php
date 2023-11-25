@extends('admin.layouts.master')

@section('page-title', 'Edit article')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">編輯文章</li>
    </ol>
    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
        <strong>錯誤！</strong> 請修正以下問題：
        <ul>
            <li>錯誤 1</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @if (count($errors) > 0)
            <!--表單錯誤清單-->
            <strong>哎呀! 出了點問題!</strong>

            <br><br>
            @include('layouts.shared.errors')
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
    <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" role="form">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">文章標題：</label>
            <input name="title" class="form-control" placeholder="請輸入文章標題" value="{{old('title',$post->title)}}">
        </div>
        <div class="form-group">
            <label for="content" class="form-label">文章內容：</label>
            <textarea id="content" name="content" class="form-control" rows="10">{{old('content',$post->content)}}></textarea>
        </div>
        <div class="form-group">
            <label for="is_feature " class="form-label">精選？</label>
            <select id="is_feature " name="is_feature" class="form-control" >
                <option value="0" {{ (!$post->is_feature)? ' selected' : '' }}>否</option>
                <option value="1" {{ ($post->is_feature)? ' selected' : '' }}>是</option>
            </select>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection
