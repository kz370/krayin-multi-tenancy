<x-admin::layouts>
    <x-slot:title>
        Create Tenant
    </x-slot>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-admin::form :action="route('admin.tenants.store')">
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                <div class="flex flex-col gap-2">
                    <div class="flex cursor-pointer items-center">
                        <!-- Breadcrumbs placeholder -->
                    </div>

                    <div class="text-xl font-bold dark:text-white">
                        Create Tenant
                    </div>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 rounded-md border border-transparent bg-brandColor px-2.5 py-1.5 font-semibold text-white transition-all hover:bg-brandTransition focus:ring-brandColor">
                        Save Tenant
                    </button>
                </div>
            </div>

            <div class="flex gap-2.5 max-xl:flex-wrap">
                <!-- Left Section: Company Details -->
                <div class="flex flex-1 flex-col gap-2.5 max-xl:max-w-full">
                    <div class="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">General Information</p>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                Company Name
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                :value="old('name')"
                                placeholder="Enter Company Name"
                                rules="required"
                                :label="'Company Name'"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                Subdomain
                            </x-admin::form.control-group.label>

                            <div class="flex items-center w-full">
                                <x-admin::form.control-group.control
                                    type="text"
                                    name="subdomain"
                                    :value="old('subdomain')"
                                    placeholder="subdomain"
                                    rules="required"
                                    :label="'Subdomain'"
                                    class="!rounded-r-none !border-r-0 flex-1"
                                >
                                </x-admin::form.control-group.control>

                                <span class="flex items-center px-4 py-2 self-stretch border border-l-0 border-gray-200 bg-gray-50 text-gray-500 rounded-r-lg text-sm font-medium dark:border-gray-800 dark:bg-gray-800 dark:text-gray-300">
                                    .{{ parse_url(config('app.url'), PHP_URL_HOST) }}
                                </span>
                            </div>

                            <x-admin::form.control-group.error control-name="subdomain"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>

                <!-- Right Section: Admin User -->
                <div class="flex w-[360px] max-w-full flex-col gap-2.5 max-md:w-full">
                    <div class="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Admin User</p>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                Name
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="admin_name"
                                :value="old('admin_name')"
                                rules="required"
                                :label="'Admin Name'"
                            >
                            </x-admin::form.control-group.control>
                            <x-admin::form.control-group.error control-name="admin_name"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                Email
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="email"
                                name="admin_email"
                                :value="old('admin_email')"
                                rules="required|email"
                                :label="'Admin Email'"
                            >
                            </x-admin::form.control-group.control>
                            <x-admin::form.control-group.error control-name="admin_email"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                Password
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="password"
                                name="admin_password"
                                rules="required|min:6"
                                :label="'Password'"
                            >
                            </x-admin::form.control-group.control>
                            <x-admin::form.control-group.error control-name="admin_password"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>
            </div>
        </div>
    </x-admin::form>
</x-admin::layouts>
