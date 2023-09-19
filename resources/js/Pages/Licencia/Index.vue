<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref } from "vue";
const props = defineProps({
  licencias: Object,
});

// const estado = ref('autorizado');
// const form = useForm({
//   estado: estado.value,
//   // nombre_conductor: ""
// });

// const autorizar = (licencia) => {
//   // licencia.estado = estado.value,
//   form.put(route('test.update', licencia.id),{
//     // nombre_conductor: licencia.nombre_conductor,
//     // estado: estado.value
//   })
// }

</script>
<template>
  <Head title="Vehiculos" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Lista de vehículos en circulación</h2>
  </template>
  <div class="py-12">
    <div class="flex justify-end mr-32">
      <Link :href="route('circulacion.create')" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Registrar</Link>
    </div>
    <div class=" max-w-7xl mx-auto overflow-hidden rounded-lg border border-gray-200 dark:border-gray-600 shadow-md m-5">
    <table class="w-full border-collapse bg-white dark:bg-gray-800 text-left text-sm text-gray-500 dark:border-gray-600">
      <thead class="bg-gray-50 dark:bg-gray-800">
        <tr>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900 dark:text-white">Conductor</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900 dark:text-white">Estado</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900 dark:text-white">Empresa</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900 dark:text-white">Placa</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900 dark:text-white"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 border-t border-gray-100 dark:border-gray-600">
        <tr class="hover:bg-gray-50 dark:hover:bg-slate-700" v-for="licencia in licencias" :key="licencia.id">
          <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
            <!-- <div class="relative h-10 w-10">
              <img
                class="h-full w-full rounded-full object-cover object-center"
                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
              />
              <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
            </div> -->
            <div class="text-sm">
              <div class="font-medium text-gray-700 dark:text-white">{{ licencia.nombre_conductor }}</div>
              <div class="text-gray-400 dark:text-white">{{ licencia.empresa }}</div>
            </div>
          </th>
          <td class="px-6 py-4 space-x-4">
            <span v-if="licencia.estado == 'autorizado'"
              class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
            >
              <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
              AUTORIZADO
            </span>
            <span v-else-if="licencia.estado == 'no_autorizado'"
              class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600"
            >
              <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
              NO AUTORIZADO
            </span>
          </td>
          <td class="px-6 py-4">{{ licencia.empresa }}</td>
          <td class="px-6 py-4">{{ licencia.placa }}</td>
          <td class="px-6 py-4 space-x-4">
            <Link v-if="licencia.estado == 'no_autorizado'" :href="route('circulacion.estado', licencia.id)" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-green-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-gray-700 dark:focus:bg-green active:bg-gray-900 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Autorizar</Link>
            <Link v-if="licencia.estado == 'autorizado'" :href="route('circulacion.estado', licencia.id)" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red active:bg-red-600 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">No Autorizar</Link>
            <!-- <div class="flex justify-end gap-4" v-if="licencia.estado == 'no_autorizado'">
              <Link class="btn btn-sm btn-info m-2" :href="route('circulacion.estado', licencia.id)">{{licencia.estado}}</Link>
            </div>
            <div class="flex justify-end gap-4" v-else-if="licencia.estado == 'autorizado'">
              <Link class="btn btn-sm btn-info m-2" :href="route('circulacion.estado', licencia.id)">{{ licencia.estado }}</Link>
            </div> -->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- <div class="mt-6">
    {{ licencias.links() }}
</div> -->
</div>
  </AuthenticatedLayout>
</template>
  

  