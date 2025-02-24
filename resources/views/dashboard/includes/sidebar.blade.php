<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{setActive('admin.dashboard')}}"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{--App\Models\Language::count()--}}0</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{--route('admin.languages')--}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{--route('admin.languages.create')--}}"
                                          data-i18n="nav.dash.crypto">أضافة لغة جديده </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item ">
                <a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الرئيسيه</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Category::parent() ->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.index.categories','type','main')}}"><a class="menu-item "
                                          href="{{route('admin.index.categories','main')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{setActive("admin.create.categories",'type','main')}}"><a class="menu-item"
                                          href="{{route('admin.create.categories','main')}}"
                                          data-i18n="nav.dash.crypto">أضافة قسم جديد</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الفرعية</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Category::child() ->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.index.categories','type','sub')}}"><a class="menu-item" href="{{route('admin.index.categories','sub')}}"
                                          data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li class="{{setActive('admin.create.categories','type','sub')}}"><a class="menu-item" href="{{route('admin.create.categories','sub')}}" data-i18n="nav.dash.crypto">أضافة
                            قسم جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الماركات التجارية</span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.index.brands')}}"><a class="menu-item" href="{{route('admin.index.brands')}}"
                                          data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li class="{{setActive('admin.create.brands')}}"><a class="menu-item" href="{{route('admin.create.brands')}}"
                           data-i18n="nav.dash.crypto">أضافة ماركة جديدة</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">العلامات</span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\Models\Tag::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.index.tags')}}"><a class="menu-item" href="{{route('admin.index.tags')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{setActive('admin.create.tags')}}"><a class="menu-item" href="{{route('admin.create.tags')}}" data-i18n="nav.dash.crypto">أضافة
                            علامة جديدة </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات</span>
                    <span class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.products')}}"><a class="menu-item" href="{{route('admin.products')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{setActive('admin.products.general.create')}}"><a class="menu-item" href="{{route('admin.products.general.create')}}"
                           data-i18n="nav.dash.ecommerce"> أضافة منتج جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">خصائص المنتجات</span>
                    <span class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Attribute::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.attributes')}}"><a class="menu-item" href="{{route('admin.attributes')}}"
                                                                   data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{setActive('admin.attributes.create')}}"><a class="menu-item" href="{{route('admin.attributes.create')}}"
                                                                                  data-i18n="nav.dash.ecommerce"> أضافة خاصية جديدة </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">قيم الخصائص </span>
                    <span class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Option::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.options')}}"><a class="menu-item" href="{{route('admin.options')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{setActive('admin.options.create')}}"><a class="menu-item" href="{{route('admin.options.create')}}" data-i18n="nav.dash.crypto">
                            أضافة قيمة خاصية جديدة </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">مستخدمي لوحه التحكم </span>
                </a>
                <ul class="menu-content">
                    <li class="{{setActive('admin.users.index')}}"><a class="menu-item" href="{{route('admin.users.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{setActive('admin.users.create')}}"><a class="menu-item" href="{{route('admin.users.create')}}" data-i18n="nav.dash.crypto">
                             إضافة مستخدم جديد</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                                                                                    data-i18n="nav.templates.main">الاعدادات</span></a>
                <ul class="menu-content">

                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">وسائل التوصيل</a>
                        <ul class="menu-content">
                            <li class="{{setActive('edit.shipping.methods',['free'])}}"><a class="menu-item" href="{{route('edit.shipping.methods',['free'])}}"
                                   data-i18n="nav.templates.vert.classic_menu">توصيل مجانى</a>
                            </li>
                            <li class="{{setActive('edit.shipping.methods',['local'])}}"><a class="menu-item" href="{{route('edit.shipping.methods',['local'])}}"> توصيل داخلى</a>
                            </li>
                            <li class="{{setActive('edit.shipping.methods',['outer'])}}"><a class="menu-item" href="{{route('edit.shipping.methods',['outer'])}}"
                                   data-i18n="nav.templates.vert.compact_menu">توصيل خارجى</a>
                            </li>
                        </ul>
                    </li>

                    <li><a class="menu-item" href="#"
                           data-i18n="nav.templates.vert.main"> شريط التمرير الجانبى </a>
                        <ul class="menu-content">
                            <li class="{{setActive('admin.sliders.create')}}"><a class="menu-item" href="{{route('admin.sliders.create')}}"
                                   data-i18n="nav.templates.vert.classic_menu"> صور شريط التمرير </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
