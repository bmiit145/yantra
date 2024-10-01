<div class="o-mail-Thread position-relative flex-grow-1 d-flex flex-column overflow-auto pb-4" tabindex="-1">
    <div class="d-flex flex-column position-relative flex-grow-1">
        @if($logs->count() > 0)
                @php
                    $logs = $logs->sortByDesc('created_at')->groupBy(function ($log) {
                        return $log->created_at->format('Y-m-d');
                    });
                @endphp

                @foreach($logs as $date => $logGroup)
                        @php
                            $date = match ($date) {
                                now()->format('Y-m-d') => 'Today',
                                now()->subDay()->format('Y-m-d') => 'Yesterday',
                                default => \Carbon\Carbon::parse($date)->format('d M Y'),
                            };
                        @endphp
                        <span class="position-absolute w-100 invisible top-0" style="height: Min(2500px, 100%)"></span>
                        <span></span>
                        <div class="o-mail-DateSection d-flex align-items-center w-100 fw-bold pt-2">
                            <hr class="flex-grow-1">
                            <span class="px-3 opacity-75 small text-muted">{{ $date }}</span>
                            <hr class="flex-grow-1">
                        </div @foreach($logGroup as $log) @php
                            $profile_pic = optional($log->user->contact)->image;
                        @endphp 
                        <div
                            class="o-mail-Message position-relative pt-1 o-selfAuthored mt-1" role="group" aria-label="Note">
                                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0 align-items-start justify-content-start">
                                        @php
                                            $user = $log->user;
                                            $initial = $user ? strtoupper(substr($user->email, 0, 1)) : '';
                                            $colors = ['#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFEB3B', '#FFC107', '#FF9800', '#FF5722'];
                                            if ($user) {
                                                $colorIndex = crc32($user->email) % count($colors);
                                                $bgColor = $colors[$colorIndex];
                                            } else {
                                                $bgColor = '#F0F0F0';
                                            }
                                        @endphp
                                        @if(optional($user)->profile)
                                            <!-- If profile image exists -->
                                            <img class="rounded" src="{{ $user->profile }}" alt="User Profile">
                                        @else
                                            <!-- If no profile image, display the first letter of email with dynamic background color -->
                                            <div class="activity-avatar-initials rounded d-flex align-items-center justify-content-center"
                                                data-id="{{$log->id}}" style="background-color: {{ $bgColor }};">
                                                <span>{{ $initial }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="w-100 o-min-width-0" style="margin-left: 10px;">
                                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline lh-1">
                                            <span class="o-mail-Message-author cursor-pointer o-hover-text-underline" aria-label="Open card">
                                                <strong class="me-1 text-truncate">{{ $log->user->email }}</strong>
                                            </span>
                                            <small class="o-mail-Message-date text-muted opacity-75 o-smaller"
                                                title="{{ $log->created_at->format('n/j/Y, g:i:s a') }}">-
                                                {{ $log->created_at->diffForHumans() }} </small>
                                            <div class="o-mail-Message-actions d-print-none ms-2 my-n2 invisible">
                                                <div class="d-flex rounded-1 overflow-hidden">
                                                    <button class="btn px-1 py-0 lh-1 rounded-0 rounded-start-1" tabindex="1"
                                                        title="Add a Reaction" aria-label="Add a Reaction">
                                                        <i class="oi fa-lg oi-smile-add"></i>
                                                    </button>
                                                    <button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star">
                                                        <i class="fa fa-lg fa-star-o"></i>
                                                    </button>
                                                    <div class="d-flex rounded-0">
                                                        <button
                                                            class="btn px-1 py-0 rounded-0 rounded-end-1 o-dropdown dropdown-toggle dropdown"
                                                            title="Expand" aria-expanded="false">
                                                            <i class="fa fa-lg fa-ellipsis-h" tabindex="1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative d-flex">
                                            <div class="o-mail-Message-content o-min-width-0 pt-1">
                                                @if($log->action != 'updated')
                                                    <div class="o-mail-Message-textContent position-relative d-flex">
                                                        <div class="position-relative overflow-x-auto d-inline-block">
                                                            <div
                                                                class="o-mail-Message-bubble rounded-bottom-3 position-absolute top-0 start-0 w-100 h-100 rounded-end-3">
                                                            </div>
                                                            <div class="position-relative text-break o-mail-Message-body p-1">
                                                                {{ $log->message }}
                                                            </div>
                                                            <div class="o-mail-Message-seenContainer position-absolute bottom-0"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($log->action == 'updated')
                                                            @php
                                                                $changedFields = json_decode($log->message, true);
                                                            @endphp
                                                            <div class="o-mail-Message-textContent position-relative d-flex">
                                                                <div>
                                                                    <ul class="mb-0 ps-4">
                                                                        @foreach($changedFields as $field => $data)
                                                                            <li class="o-mail-Message-tracking mb-1" style="list-style-type: disc;"
                                                                                role="group">
                                                                                <span
                                                                                    class="o-mail-Message-trackingOld me-1 px-1 text-muted fw-bold">{{ $data['old'] }}</span>
                                                                                <i
                                                                                    class="o-mail-Message-trackingSeparator fa fa-long-arrow-right mx-1 text-600"></i>
                                                                                <span
                                                                                    class="o-mail-Message-trackingNew me-1 fw-bold text-info">{{ $data['new'] }}</span>
                                                                                <span
                                                                                    class="o-mail-Message-trackingField ms-1 fst-italic text-muted">({{ $field }})</span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                @endif
                                                @if($log->attachments != null)
                                                    <div class="o-mail-AttachmentList overflow-y-auto d-flex flex-column mt-1">
                                                        <div class="d-flex flex-grow-1 flex-wrap mx-1 align-items-center" role="menu"></div>
                                                        <div class="grid row-gap-0 column-gap-0">
                                                            <div class="o-mail-AttachmentCard d-flex rounded mb-1 me-1 mw-100 overflow-auto g-col-4 bg-300"
                                                                role="menu" title="vdb.xlsx" aria-label="vdb.xlsx">
                                                                <div class="o-mail-AttachmentCard-image o_image flex-shrink-0 m-1" role="menuitem"
                                                                    aria-label="Preview" tabindex="-1"
                                                                    data-mimetype="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                                                </div>
                                                                <div class="overflow-auto d-flex justify-content-center flex-column px-1">
                                                                    <div class="text-truncate">vdb.xlsx</div>
                                                                    <small class="text-uppercase">xlsx</small>
                                                                </div>
                                                                <div class="flex-grow-1"></div>
                                                                <div
                                                                    class="o-mail-AttachmentCard-aside position-relative rounded-end overflow-hidden d-flex o-hasMultipleActions flex-column">
                                                                    <button
                                                                        class="o-mail-AttachmentCard-unlink btn top-0 align-items-center justify-content-center d-flex w-100 h-100 rounded-0 border-0 bg-300"
                                                                        title="Remove">
                                                                        <i class="fa fa-trash" role="img" aria-label="Remove"></i>
                                                                    </button>
                                                                    <button
                                                                        class="btn d-flex align-items-center justify-content-center w-100 h-100 rounded-0 bg-300"
                                                                        title="Download">
                                                                        <i class="fa fa-download" role="img" aria-label="Download"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @endforeach
        @else
            <div class="o-mail-Message position-relative undefined o-selfAuthored py-1 mt-2" role="group"
                aria-label="System notification">
                <div class="o-mail-Message-core position-relative d-flex flex-shrink-0">
                    <div class="o-mail-Message-sidebar d-flex flex-shrink-0">
                        <div class="o-mail-Message-avatarContainer position-relative bg-view cursor-pointer"
                            aria-label="Open card">
                            <img class="o-mail-Message-avatar w-100 h-100 rounded o_object_fit_cover o_redirect cursor-pointer"
                                src="https://yantradesign.odoo.com/web/image/res.partner/3/avatar_128?unique=1721388544000">
                        </div>
                    </div>
                    <div class="w-100 o-min-width-0">
                        <div class="o-mail-Message-header d-flex flex-wrap align-items-baseline mb-1 lh-1">
                            <span class="o-mail-Message-author cursor-pointer" aria-label="Open card">
                                <strong class="me-1 text-truncate">{{ auth()->user()->email }}</strong>
                            </span>
                            <small class="o-mail-Message-date text-muted opacity-75 me-2" title="now">- now</small>
                            <span
                                class="o-mail-MessageSeenIndicator position-relative d-flex opacity-50 o-all-seen text-primary ms-1"></span>
                        </div>
                        <div class="position-relative d-flex">
                            <div class="o-mail-Message-content o-min-width-0">
                                <div class="o-mail-Message-textContent position-relative d-flex">
                                    <div>
                                        <div class="o-mail-Message-body text-break mb-0 w-100">
                                            Creating a new record...
                                        </div>
                                    </div>
                                    <div class="o-mail-Message-actions ms-2 mt-1 invisible">
                                        <div class="d-flex rounded-1 bg-view shadow-sm overflow-hidden">
                                            <button class="btn px-1 py-0 rounded-0" tabindex="1" title="Add a Reaction"
                                                aria-label="Add a Reaction">
                                                <i class="oi fa-lg oi-smile-add"></i>
                                            </button>
                                            <button class="btn px-1 py-0 rounded-0" title="Mark as Todo" name="toggle-star">
                                                <i class="fa fa-lg fa-star-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
</div>
</div>