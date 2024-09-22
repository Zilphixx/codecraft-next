<x-app-layout>

    <x-slot name="header">
        <header class="breadcrumbs text-sm w-full sm:w-3/4 sm:mx-auto py-6">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-300">
                        Dashboard
                    </a>
                </li>
                <li>
                    <span class="hover:text-blue-300">
                        Teachers
                    </span>
                </li>
                <li>
                    <span class="hover:text-blue-300">
                        Unverified Teachers
                    </span>
                </li>
            </ul>
        </header>
    </x-slot>

    <main>
        <div class="w-full sm:w-3/4 sm:mx-auto rounded-lg shadow-2xl border border-slate-500 p-3">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden" id="teachers-list-wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <dialog id="approve" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Approve Teacher ?</h3>
            <p class="py-4">Are you sure you want to approve this teacher ?</p>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-neutral btn-sm" id="approve-close">Close</button>
                </form>
                <button type="button" class="btn btn-primary btn-sm" onclick="teacherAction('approve', this)">
                    Approve
                </button>
            </div>
        </div>
    </dialog>

    <dialog id="reject" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Reject Teacher?</h3>
            <p class="py-4">Are you sure you want to reject this teacher ?</p>
            <label class="label" for="reason">Please provide your reason for rejection.</label>
            <textarea id="reason" class="textarea textarea-bordered w-full"></textarea>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-neutral btn-sm" id="reject-close">Close</button>
                </form>

                <button type="button" class="btn btn-error btn-sm text-gray-100"
                    onclick="teacherAction('reject', this)">
                    Reject
                </button>
            </div>
        </div>
    </dialog>

    <button id="alert-btn" class="hidden" onclick="alertModal.showModal()">Alert</button>
    <dialog id="alertModal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Success</h3>
            <p class="py-4" id="alert-message"></p>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-neutral btn-sm" id="alert-close">Ok</button>
                </form>
            </div>
        </div>
    </dialog>

    @push('scripts')
        <script>
            let teachersList;
            document.addEventListener('DOMContentLoaded', () => {
                teachersList = new Grid({
                    search: true,
                    pagination: true,
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    columns: [{
                            name: 'Name',
                        },
                        'Email',
                        'Contact Number',
                        'ID/License',
                        {
                            name: 'Actions',
                            sort: false,
                        }
                    ],
                    server: {
                        url: "{{ route('get.teachers', 0) }}",
                        then: data => data.map(teacher => [
                            teacher.name,
                            teacher.email,
                            teacher.contact_number,
                            html(`
                        <span class="text-center">
                            <a class="text-blue-500 hover:underline" href="{{ url('view-file/${teacher.file}') }}" target="_blank" >
                                View ID/License
                            </a>
                        </span>
                    `),
                            html(`
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm text-gray-100"
                                onclick="approve.showModal()" id="approve-btn" data-id="${teacher.id}" >
                                Approve
                            </button>
                            <button type="button" class="btn btn-error btn-sm text-gray-100" 
                                onclick="reject.showModal()" id="reject-btn" data-id="${teacher.id}" >
                                Reject
                            </button>
                        </div>
                    `)

                        ]),
                    }
                }).render(document.querySelector('#teachers-list-wrapper'));

                
                console.log(teachersList.config.server.then.length)
            });


            function teacherAction(condition, button) {
                button.innerHTML = '<span class="loading loading-dots loading-md"></span>';
                if (condition === 'approve') {
                    axios.post('{{ route('verify.teacher') }}', {
                        id: document.querySelector('#approve-btn').dataset.id,
                        action: 'Approve'
                    }).then((response) => {
                        console.log(response);
                        button.innerHTML = 'Approve';
                        document.querySelector('#approve-close').click();
                        updateRender();
                        document.querySelector('#alert-message').innerText = response.data.message;
                        document.querySelector('#alert-btn').click();
                        setTimeout(() => {
                            document.querySelector('#alert-close').click();
                            document.querySelector('#alert-message').innerText = '';
                        }, 5000);
                    });
                } else {
                    axios.post('{{ route('verify.teacher') }}', {
                        id: document.querySelector('#reject-btn').dataset.id,
                        action: 'Reject',
                        reason: document.querySelector('#reason').value
                    }).then((response) => {
                        console.log(response);
                        button.innerHTML = 'Reject';
                        document.querySelector('#reject-close').click();
                        updateRender();
                        document.querySelector('#alert-message').innerText = response.data.message;
                        document.querySelector('#alert-btn').click();
                        setTimeout(() => {
                            document.querySelector('#alert-close').click();
                            document.querySelector('#alert-message').innerText = '';
                        }, 5000);
                    });
                }
            }

            function updateRender() {
                if (teachersList) {
                    teachersList.destroy()
                }
                teachersList = new Grid({
                    search: true,
                    pagination: true,
                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    columns: [{
                            name: 'Name',
                        },
                        'Email',
                        'Contact Number',
                        'ID/License',
                        {
                            name: 'Actions',
                            sort: false,
                        }
                    ],
                    server: {
                        url: "{{ route('get.teachers', 0) }}",
                        then: data => data.map(teacher => [
                            teacher.name,
                            teacher.email,
                            teacher.contact_number,
                            html(`
                        <span class="text-center">
                            <a class="text-blue-500 hover:underline" href="{{ url('view-file/${teacher.file}') }}" target="_blank" >
                                View ID/License
                            </a>
                        </span>
                    `),
                            html(`
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm text-gray-100"
                                onclick="approve.showModal()" id="approve-btn" data-id="${teacher.id}" >
                                Approve
                            </button>
                            <button type="button" class="btn btn-error btn-sm text-gray-100" 
                                onclick="reject.showModal()" id="reject-btn" data-id="${teacher.id}" >
                                Reject
                            </button>
                        </div>
                    `)

                        ]),
                    }
                }).render(document.querySelector('#teachers-list-wrapper'));

                console.log(teachersList.config.server.then.length)

            }
        </script>
    @endpush
</x-app-layout>
