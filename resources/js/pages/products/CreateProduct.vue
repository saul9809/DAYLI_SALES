<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

//Predefiniendo datos en el fomrulariuo por defecto
const form = useForm({
    name: '',
    description: '',
});

//Configuración por defecto de el historia de navegación
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Adicionar Producto',
        href: 'products.create_product',
    },
];
//Redirigiendo la informacion al backend a travez de la ruta, manejando submit
const heandleSubmit = () => {
    form.post(route('products.store'));
};
</script>
<template>
    <Head title="Adicionar Producto" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <!--Previendo que se recargur la pagina y enviando los datos al metodo hendleSubmit-->
            <form @submit.prevent="heandleSubmit" class="w-8/12 space-y-4">
                <!--Input del nombre del producto-->
                <div class="space-y-2">
                    <Label for="Product name">Nombre del Producto</Label>
                    <Input v-model="form.name" type="text" placeholder="Name" />
                    <div class="bg-red-600 text-sm" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <!--Input de la descripción del producto-->
                <div class="space-y-2">
                    <Label for="Product name">Descripción</Label>
                    <Input v-model="form.description" type="text" placeholder="Descripción del producto" />
                    <div class="bg-red-600 text-sm" v-if="form.errors.description">{{ form.errors.description }}</div>
                </div>
                <Button type="submit" :disabled="form.processing">Adicionar Producto</Button>
            </form>
        </div>
    </AppLayout>
</template>
