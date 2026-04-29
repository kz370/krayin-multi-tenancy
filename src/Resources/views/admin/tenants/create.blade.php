<x-admin::layouts>
    <x-slot:title>
        @lang('multi_tenancy::app.create.title')
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
                    <div class="flex items-center gap-x-2 text-sm text-gray-500 dark:text-gray-400">
                        <a
                            href="{{ route('admin.dashboard.index') }}"
                            class="text-sky-500 transition hover:text-sky-600 dark:text-sky-400 dark:hover:text-sky-300"
                        >
                            @lang('multi_tenancy::app.breadcrumbs.dashboard')
                        </a>

                        <span class="text-gray-400">/</span>

                        <a
                            href="{{ route('admin.tenants.index') }}"
                            class="text-sky-500 transition hover:text-sky-600 dark:text-sky-400 dark:hover:text-sky-300"
                        >
                            @lang('multi_tenancy::app.breadcrumbs.tenants')
                        </a>

                        <span class="text-gray-400">/</span>

                        <span class="font-medium text-gray-900 dark:text-white">
                            @lang('multi_tenancy::app.breadcrumbs.create')
                        </span>
                    </div>

                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        @lang('multi_tenancy::app.create.title')
                    </h1>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="inline-flex w-full max-w-max cursor-pointer items-center justify-between gap-x-2 rounded-md border border-transparent bg-brandColor px-2.5 py-1.5 font-semibold text-white transition-all hover:bg-brandTransition focus:ring-brandColor">
                        @lang('multi_tenancy::app.create.save-btn')
                    </button>
                </div>
            </div>

            <div class="flex gap-2.5 max-xl:flex-wrap">
                <!-- Left Section: Company Details -->
                <div class="flex flex-1 flex-col gap-2.5 max-xl:max-w-full">
                    <div class="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">@lang('multi_tenancy::app.create.general-info')</p>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('multi_tenancy::app.create.name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                :value="old('name')"
                                :placeholder="__('multi_tenancy::app.create.name-placeholder')"
                                rules="required"
                                :label="__('multi_tenancy::app.create.name')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('multi_tenancy::app.create.subdomain')
                            </x-admin::form.control-group.label>

                            <div class="flex items-center w-full">
                                <x-admin::form.control-group.control
                                    type="text"
                                    name="subdomain"
                                    :value="old('subdomain')"
                                    :placeholder="__('multi_tenancy::app.create.subdomain-placeholder')"
                                    rules="required"
                                    :label="__('multi_tenancy::app.create.subdomain')"
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
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">@lang('multi_tenancy::app.create.admin-user')</p>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('multi_tenancy::app.create.admin-name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="admin_name"
                                :value="old('admin_name')"
                                :placeholder="__('multi_tenancy::app.create.admin-name-placeholder')"
                                rules="required"
                                :label="__('multi_tenancy::app.create.admin-name')"
                            >
                            </x-admin::form.control-group.control>
                            <x-admin::form.control-group.error control-name="admin_name"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('multi_tenancy::app.create.admin-email')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="email"
                                name="admin_email"
                                :value="old('admin_email')"
                                :placeholder="__('multi_tenancy::app.create.admin-email-placeholder')"
                                rules="required|email"
                                :label="__('multi_tenancy::app.create.admin-email')"
                            >
                            </x-admin::form.control-group.control>
                            <x-admin::form.control-group.error control-name="admin_email"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('multi_tenancy::app.create.admin-password')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="password"
                                name="admin_password"
                                :placeholder="__('multi_tenancy::app.create.admin-password-placeholder')"
                                rules="required|min:6"
                                :label="__('multi_tenancy::app.create.admin-password')"
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
