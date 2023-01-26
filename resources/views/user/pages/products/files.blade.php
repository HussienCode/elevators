@extends('user.layout.master')
@section('content')
    <div class="evelator">
        <div class="container">
            <h1>مصعد ركاب</h1>
            {{-- <p>
                مشروع مشترك بين الصين واليابان العلامة التجارية الشهيرة 2 سنة الضمان
                ممتاز خدمة ما بعد البيع بيع سمعة رائعة في جميع أنحاء العالم.
            </p>
            <div class="row">
                <div class="col-12">
                    <p>
                        يستخدم مصعد الركاب بغرفة الماكينة الصغيرة كفاءة في استخدام الطاقة
                        ، منخفضة السرعة ، مغناطيس دائم متزامن بدون تروس آلة الجر.
                        بالمقارنة مع المصعد الموجه مع ما يعادله مستوى التحميل ، يوفر حوالي
                        33٪ من الطاقة. المصممة خصيصا خزانة تحكم صغيرة الحجم تجمع بين
                        الخسارة المنخفضة الأكثر تقدمًا IGBTs وأفضل حلول التصميم لتوفير
                        مساحة للغرفة مرتبة بشكل مثالي.
                    </p>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-sm align-middle table-bordered table-hover border-dark">
                        <thead>
                            <tr>
                                {{-- <th scope="col">م.</th> --}}
                                <th scope="col">{{__('message.file name')}}</th>
                                <th scope="col">{{__('message.description')}}</th>
                                <th scope="col">{{__('message.file type')}}</th>
                                <th scope="col">{{__('message.download')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $item)

                                <tr>
                                    {{-- <th scope="row">1</th> --}}
                                    <td>{{$item->title}}</td>
                                    <td>
                                        {{$item->description}}
                                    </td>
                                    <td>{{$item->extension}}</td>
                                    <td>
                                        <a href="{{route('downlaod', $item->id)}}">
                                            <i class="fas fa-download fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
