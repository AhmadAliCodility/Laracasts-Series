<div>
  <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>

  <div class="py-4 space-y-4">
    <div>
      <div class="w-1/4"><x-input.text wire:model="search" placeholder="Search Transactions..." /></div>
    </div>
    <!-- Transactions Table -->
    <div class="flex-col space-y-4">

      <div>
        <x-table>
          <x-slot name="head">
            <x-table.heading sortable>Title</x-table.heading>
            <x-table.heading sortable>Amount</x-table.heading>
            <x-table.heading sortable>Status</x-table.heading>
            <x-table.heading sortable>Date</x-table.heading>
          </x-slot>
          <x-slot name="body">
          @forelse($transactions as $transaction)
            <x-table.row wire:loading.class.delay="opacity-50" wire:key="{{ $transaction->id }}">
              <x-table.cell>
                  <span  class=" inline-flex space-x-2 truncate text-sm leading-5">
                    <x-icon.cash class="text-cool-gray-500" />
                    <p class="text-cool-gray-600 truncate">
                      {{ $transaction->title }}
                    </p>
                  </span>
              </x-table.cell>
              <x-table.cell>
                <span class="text-cool-gray-900 font-medium">{{ number_format($transaction->amount) }} PKR</span>
              </x-table.cell>
              <x-table.cell>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 capitalize">
                  {{ $transaction->status }}
                </span>
              </x-table.cell>
              <x-table.cell>{{ $transaction->date_for_humans }}</x-table.cell>
            </x-table.row>
            @empty
              <x-table.row>
                <x-table.cell colspan="4">
                  <div class="flex justify-center items-center space-x-2">
                    <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                    <span class="font-medium py-8 text-cool-gray-400 text-xl">No transactions found...</span>
                  </div>
                </x-table.cell>
              </x-table.row>
            @endforelse
          </x-slot>
        </x-table>
        <div> {{ $transactions->links() }}</div>

      </div>
    </div>
  </div>

</div>