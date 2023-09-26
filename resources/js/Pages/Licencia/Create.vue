<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from 'vue';
const form = useForm({
    nombre_conductor: "",
    ruta: "",
    placa: "",
    codigo: "",
    empresa: "",
    estado: "",
});

const max = ref(6);

const save = () => {
    form.post(route('circulacion.store'));
}
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Registro de vehiculo"></Head>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Registrar vehículo en circulación</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <div
                      class="w-full border-collapse bg-white text-left text-sm text-gray-500 dark:bg-gray-800 rounded-lg shadow-xl sm:w-full sm:mx-auto"
                    >
                      <div class="p-4">
                        <div class="mb-6">
                          <InputLabel>Nombre del propietario</InputLabel>
                          <TextInput class="w-full border-gray-300" v-model="form.nombre_conductor"></TextInput>
                          <InputError class="mt-2" :message="form.errors.nombre_conductor" />
                        </div>
                        <div class="mb-6">
                          <InputLabel>Dirección</InputLabel>
                          <TextInput class="w-full border-gray-300" v-model="form.ruta"></TextInput>
                          <InputError class="mt-2" :message="form.errors.ruta" />
                        </div>
                        <div class="mb-6">
                          <InputLabel>Placa del vehiculo</InputLabel>
                          <TextInput class="w-full border-gray-300" :maxlength="max" v-model="form.placa"  placeholder="ASD903"></TextInput>
                          <span class="text-red-300">Máximo de caracteres 6</span>
                          <InputError class="mt-2" :message="form.errors.placa" />
                        </div>
                        <div class="mb-6">
                            <InputLabel>Nombre de la empresa</InputLabel>
                            <TextInput class="w-full border-gray-300" v-model="form.empresa"></TextInput>
                            <InputError class="mt-2" :message="form.errors.empresa" />
                          </div>
                        <div class="mb-6">
                          <InputLabel>Codigo de empresa</InputLabel>
                          <TextInput class="w-full border-gray-300" v-model="form.codigo"></TextInput>
                          <InputError class="mt-2" :message="form.errors.codigo" />
                        </div>
                        <div class="mt-6 flex space-x-4 justify-end">
                          <Link
                            :href="route('circulacion.index')"
                            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                            >Cancelar</Link
                          >
                          <PrimaryButton @click="save()">Registrar</PrimaryButton>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

        
    </AuthenticatedLayout>
</template>

<style lang="scss" scoped>

</style>