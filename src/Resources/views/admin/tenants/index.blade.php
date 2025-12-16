<x-admin::layouts>
    <x-slot:title>
        Manage Tenants
    </x-slot>

    <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex cursor-pointer items-center">
                    <!-- You might need to add breadcrumbs component if available, skipping for now to reduce errors -->
                </div>

                <div class="text-xl font-bold dark:text-white">
                    Tenants
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('admin.tenants.create') }}" class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 rounded-md border border-transparent bg-brandColor px-2.5 py-1.5 font-semibold text-white transition-all hover:bg-brandTransition focus:ring-brandColor">
                    Create New Tenant
                </a>
            </div>
        </div>

        <div class="flex flex-col justify-between gap-y-2.5 rounded-lg border border-gray-200 bg-white w-full dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="table-responsive w-full">
                <table class="min-w-full leading-normal" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">ID</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">Name</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">Subdomain</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">Database</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">Status</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">Created At</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tenants as $tenant)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-900 dark:border-gray-700">{{ $tenant->id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-900 dark:border-gray-700">{{ $tenant->name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-900 dark:border-gray-700">
                                <a href="https://{{ $tenant->subdomain }}.{{ parse_url(config('app.url'), PHP_URL_HOST) }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                                    {{ $tenant->subdomain }}
                                </a>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-900 dark:border-gray-700">{{ $tenant->database_name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-900 dark:border-gray-700">
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight {{ $tenant->is_active ? 'text-green-900' : 'text-red-900' }}">
                                    <span aria-hidden class="absolute inset-0 {{ $tenant->is_active ? 'bg-green-200' : 'bg-red-200' }} opacity-50 rounded-full"></span>
                                    <span class="relative">{{ $tenant->is_active ? 'Active' : 'Inactive' }}</span>
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-900 dark:border-gray-700">{{ $record->created_at ?? $tenant->created_at }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-900 dark:border-gray-700">
                                <a href="{{ route('admin.tenants.edit', $tenant->id) }}" class="icon-edit text-xl text-gray-600 hover:text-gray-900 mr-2" title="Edit"></a>

                                <a href="javascript:void(0);" onclick="if(confirm('Are you sure you want to soft delete (deactivate)?')){ document.getElementById('delete-tenant-{{ $tenant->id }}').submit(); }" class="icon-delete text-xl text-yellow-600 hover:text-yellow-900 mr-2" title="Soft Delete / Deactivate"></a>

                                <a href="javascript:void(0);" onclick="openHardDeleteModal({{ $tenant->id }}, '{{ addslashes($tenant->name) }}')" class="text-xl ml-2 cursor-pointer hover:scale-110 transition-transform" title="Permanent Hard Delete">💀</a>

                                <form id="delete-tenant-{{ $tenant->id }}" action="{{ route('admin.tenants.delete', $tenant->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Hard Delete Modal -->
    <div id="hardDeleteModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <!-- Overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeHardDeleteModal()"></div>

            <div class="inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full dark:bg-gray-900 w-full max-w-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <form id="hardDeleteForm" method="POST" action="">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 dark:bg-gray-900">
                        <h3 class="text-lg leading-6 font-medium text-red-600 dark:text-red-400" id="modal-title">⚠️ Permanent Hard Delete</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                Are you sure you want to <strong>permanently delete</strong> tenant <strong id="modalTenantName"></strong>?
                                <br><br>
                                This action is <strong>IRREVERSIBLE</strong>. It will:
                                <ul class="list-disc list-inside text-xs text-red-500 mt-1">
                                    <li>Permanently delete the database.</li>
                                    <li>Permanently remove all data.</li>
                                    <li>Remove the tenant record.</li>
                                </ul>
                            </p>
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Confimation: Admin Password</label>
                                <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required placeholder="Enter your admin password">
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse dark:bg-gray-800">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Confirm Permanent Delete
                        </button>
                        <button type="button" onclick="closeHardDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openHardDeleteModal(id, name) {
            document.getElementById('modalTenantName').innerText = name;
            let url = "{{ route('admin.tenants.force_delete', ':id') }}";
            url = url.replace(':id', id);
            document.getElementById('hardDeleteForm').action = url;
            document.getElementById('hardDeleteModal').classList.remove('hidden');
        }

        function closeHardDeleteModal() {
            document.getElementById('hardDeleteModal').classList.add('hidden');
        }
    </script>
</x-admin::layouts>
