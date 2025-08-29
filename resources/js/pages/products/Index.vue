<script setup lang="ts">
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import Button from '@/components/ui/button/Button.vue';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Rocket } from 'lucide-vue-next';

interface Product {
    id: number;
    name: string;
    description: string;
}

interface Props {
    products: Product[];
}
//Asignanado propiedades al sitio
const page = usePage();
//Resiviendo datos desde el controlador a partir del metodo defineProps de inertia
const props = defineProps<Props>();
//Configuración pordefecto de la ruta
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Productos',
        href: '/products',
    },
];
</script>

<template>
    <Head title="Productos" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <!--Notificación de producto guardado-->
        <div class="p-4">
            <div v-if="page.props.flash?.message" class="alert">
                <Alert class="bg-blue-200">
                    <Rocket class="h-4 w-4" />
                    <AlertTitle>Notificación</AlertTitle>
                    <AlertDescription>
                        {{ page.props.flash.message }}
                    </AlertDescription>
                </Alert>
            </div>
            <div>
                <Link :href="route('products.create_product')"><Button>Add Producto</Button></Link>
            </div>
            <!--Tabla que lista el producto-->
            <div>
                <Table>
                    <TableCaption>Lista del producto añadido reciente.</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead>ID</TableHead>
                            <TableHead>Nombre</TableHead>
                            <TableHead>Descripción</TableHead>
                            <TableHead class="text-center">Acciones</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody v-for="product in props.products" :key="product.id">
                        <TableRow>
                            <TableCell>{{ product.id }}</TableCell>
                            <TableCell>{{ product.name }}</TableCell>
                            <TableCell>{{ product.description }}</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
