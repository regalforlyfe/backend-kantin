<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">    
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/"
                                aria-expanded="false"><i class="fas fa-home"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/order"
                                aria-expanded="false"><i class="fas fa-shopping-cart"></i><span
                                    class="hide-menu">Order</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-file-alt"></i><span
                                    class="hide-menu">Report </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/byviewers" class="sidebar-link"><span
                                            class="hide-menu"> By Viewers
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/byorders" class="sidebar-link"><span
                                            class="hide-menu"> By Orders
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @if(Auth::user()->tipe_user=='admin')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-user"></i><span
                                    class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin" class="sidebar-link"><span
                                            class="hide-menu"> Admin
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/penjual" class="sidebar-link"><span
                                            class="hide-menu"> Penjual
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/pembeli" class="sidebar-link"><span
                                            class="hide-menu"> Pembeli
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-archive"></i><span
                                    class="hide-menu">Master Data </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('toko.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> Toko
                                        </span></a>
                                </li>
                                @if(Auth::user()->tipe_user=='admin')
                                <li class="sidebar-item"><a href="{{route('kategori.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> Kategori
                                        </span></a>
                                </li>
                                @endif
                                <li class="sidebar-item"><a href="{{route('produk.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> Produk
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>