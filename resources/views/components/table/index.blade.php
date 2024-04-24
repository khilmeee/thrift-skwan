<div {{ $attributes->merge(['class'=> "w-full border border-slate-200 rounded-xl overflow-x-auto"])}}>
    <table class="w-full divide-y divide-slate-200">
        <thead class="bg-slate-100 text-slate-800">
            <tr>
                {{-- <th class="px-4 py-2 text-start">Heading</th> --}}
                {{ $heading ?? 'no heading'}}
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white text-slate-800">
            {{ $slot }}
        </tbody>
    </table>
</div>