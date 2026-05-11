       {{-- Header Section --}}
<div class="row justify-content-center mb-5">
    <div class="col-12 col-lg-10">
        <div class="card border-0 shadow-lg" style="border-radius: 14px !important; overflow: hidden;">

            {{-- Üst: Başlık + Kullanıcı --}}
            <div class="d-flex flex-column flex-sm-row align-items-stretch">

                {{-- Sol: Başlık --}}
                <div class="flex-grow-1 p-4" style="border-bottom: 0.5px solid rgba(0,0,0,0.08); border-right: none;">
                    <span class="badge mb-2 px-3 py-1"
                        style="background:#E6F1FB;color:#0C447C;font-size:10px;font-weight:500;letter-spacing:0.4px;text-transform:uppercase;border-radius:20px;">
                        <i class="bi bi-clipboard-check me-1"></i>Görev Paneli
                    </span>
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <div class="d-flex align-items-center justify-content-center rounded-3 bg-primary flex-shrink-0"
                            style="width:40px;height:40px;">
                            <i class="bi bi-clipboard-check text-white" style="font-size:1.2rem;"></i>
                        </div>
                        <h1 class="fw-semibold text-dark mb-0" style="font-size:1.45rem;">Görev Yöneticisi</h1>
                    </div>
                    <p class="text-muted mb-0" style="font-size:0.85rem;margin-left:52px;">
                        Görevlerinizi organize edin ve takip edin
                    </p>
                </div>

                {{-- Sağ: Kullanıcı --}}
                <div class="d-flex align-items-center gap-3 p-3 flex-shrink-0"
                    style="border-top: 0.5px solid rgba(0,0,0,0.08);">

                    {{-- Mobilde yatay, masaüstünde dikey ayraç --}}
                    <div class="d-none d-sm-block"
                        style="width:0.5px;height:100%;background:rgba(0,0,0,0.08);align-self:stretch;"></div>

                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white fw-semibold flex-shrink-0"
                        style="width:44px;height:44px;font-size:0.95rem;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                    <div class="flex-grow-1 min-width-0">
                        <div class="fw-semibold text-dark text-truncate" style="font-size:0.88rem;">{{ auth()->user()->name }}</div>
                        <div class="text-muted" style="font-size:0.75rem;">Yönetici</div>
                    </div>
                    <div class="d-flex flex-row flex-sm-column gap-2">
                        <a href="{{ route('profile') }}"
                            class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1"
                            style="font-size:11px;border-radius:7px;white-space:nowrap;">
                            <i class="bi bi-person"></i>
                            <span>Hesabım</span>
                        </a>
                        <a href="{{ route('logout') }}"
                            class="btn btn-sm d-flex align-items-center gap-1"
                            style="font-size:11px;border-radius:7px;white-space:nowrap;background:#FCEBEB;color:#A32D2D;border:0.5px solid #F7C1C1;">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Çıkış Yap</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Alt: İstatistikler + Yeni Görev --}}
            <div style="border-top: 0.5px solid rgba(0,0,0,0.08);">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-4 py-3">
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-2"
                            style="background:#E6F1FB;color:#0C447C;font-size:12px;font-weight:500;">
                            <span style="width:7px;height:7px;border-radius:50%;background:#185FA5;display:inline-block;"></span>
                            Toplam: {{ $taskCount }} görev
                        </span>
                        <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-2"
                            style="background:#EAF3DE;color:#27500A;font-size:12px;font-weight:500;">
                            <span style="width:7px;height:7px;border-radius:50%;background:#3B6D11;display:inline-block;"></span>
                            Tamamlanan: {{$completedCount}}
                        </span>
                        <span class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-2"
                            style="background:#f79a87b5;color:#27500A;font-size:12px;font-weight:500;">
                            <span style="width:7px;height:7px;border-radius:50%;background:#3B6D11;display:inline-block;"></span>
                            Bekleyen: {{$unCompletedCount}}
                        </span>
                    </div>
                    <a href="{{ route('taskCreate') }}"
                        class="btn btn-primary d-flex align-items-center gap-2"
                        style="border-radius:9px;font-size:13px;">
                        <i class="bi bi-plus"></i>Yeni Görev
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
