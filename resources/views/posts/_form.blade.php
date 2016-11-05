{!! Form::label('title', 'Title') !!}
{!! Form::text('title', null, ['class' => 'pure-u-1-2']) !!}

{!! Form::label('body', 'Body') !!}
{!! Form::textarea('body', null, ['class' => 'pure-u-1']) !!}

{!! Form::label('pub_date', 'Published Date') !!}
{!! Form::datetime('pub_date', null, ['class' => 'pure-u-1-3']) !!}

{!! Form::label('tags[]', 'Tags') !!}
{!! Form::select('tags[]',
    \App\Tag::all()->pluck('name', 'id'),
    $post->tags->pluck('id')->toArray(),
    ['multiple' => true, 'class' => 'pure-u-1-3']) !!}

<label for="published">
    Published?
    {!! Form::checkbox('published') !!}
</label>


{!! Form::submit('Save', ['class' => 'pure-button pure-button-primary']) !!}