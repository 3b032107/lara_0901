@extends('admin.layouts.master')

@section('page-title', 'Edit article')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">文章管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">編輯文章</li>
        </ol>
        @include('admin.layouts.shared.errors')
        <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">標題：</label>
                <input id="title" name="title" type="text" class="form-control" value="{{old('title', $post->title)}}" placeholder="請輸入文章標題">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">內容：</label>
                <textarea id="content" name="content" class="form-control" rows="10" placeholder="請輸入文章內容">{{old('content', $post->content)}}</textarea>
            </div>
            <div class="form-group">
                <label for="is_feature" class="form-label">精選？</label>
                <select id="is_feature" name="is_feature">
                    <option value="0" {{ (!$post->is_feature)?'selected':'' }}>否</option>
                    <option value="1" {{ ($post->is_feature)?'selected':'' }}>是</option>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary btn-sm" type="submit">儲存</button>
            </div>
        </form>
    </div>
@endsection
