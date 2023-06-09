@extends('layouts.app')
@section('content')
<table class="table-fixed w-full text-sm">
    <tbody class="bg-white dark:bg-slate-800">
        <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                {{ __('Name') }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                {{ $role->name }}</td>
        </tr>
        <tr>
            @unless ($role->name == env('APP_SUPER_ADMIN', 'super-admin'))
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                    {{ __('Permissions') }}</td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    <div class="py-2">
                        <div class="grid grid-cols-4 gap-4">
                            @forelse ($permissions as $permission)
                                <div class="col-span-4 sm:col-span-2 md:col-span-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                            {{ in_array($permission->id, $roleHasPermissions) ? 'checked' : '' }}
                                            disabled="disabled"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @empty
                                ----
                            @endforelse
                        </div>
                    </div>
                </td>
            </tr>
        @endunless
        <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                {{ __('Created') }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                {{ $role->created_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
