<template>
    <Head title="Orders" />
    <breadcrumb title="Orders" :crumbs="['Dashboard', 'Orders']" />
  
    <div class="card shadow col-lg-10 mx-auto">
      <div class="card-body">
          <div class="text-end">
              
  
              <InertiaLink :href="route('admin.orders.create')" class="btn btn-outline-primary">
                  <i class="fa fa-plus"></i>
                  Add Order
              </InertiaLink>
          </div>
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
  
                <tbody v-if="orders.length">
                    <tr v-for="(order, key) in orders" :key="key">
                        <td>{{order.order_num}}</td>
                        <td>{{order.order_name}}</td>
                        <td>
                            <div v-if="order.order_status === 'delivered'">
                                <i class="fa fa-check"></i> Delivered 
                            </div> 
                            <div v-else-if="order.order_status === 'in_transit'">
                                <i class="fa fa-circle-o-notch"></i> In Transit
                            </div>
                            <div v-else-if="order.order_status === 'pending'">
                                <i class="fa fa-ellipsis-h"></i> Pending
                            </div>
                            <div v-else-if="order.order_status === 'not_collected'">
                                <i class="fa fa-times"></i>
                              Not Collected
                            </div> 
                            <div v-else>
                                Nothing
                            </div>  
                        </td>
                        <td>{{new Date(order.created_at).toDateString()}}</td>
                        <td>
                            <InertiaLink :href="route('admin.orders.edit',order.id)" class="btn btn-primary mx-1 btn-sm">
                                <i class="fa fa-edit"></i>
                            </InertiaLink>
                            <a :href="route('admin.orders.reciept',order.order_num)" target="_blank" class="btn btn-secondary mx-1 btn-sm">
                                <i class="fa fa-eye"></i> View Page
                            </a>
  
                            <InertiaLink method="delete" :href="route('admin.orders.destroy',order.id)" class="btn btn-outline-danger btn-sm mx-1" as="button">
                                <i class="fa fa-trash"></i>
                            </InertiaLink>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                  <tr>
                      <td colspan="9" class="text-muted text-center">No Orders found</td>
                  </tr>
                </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center" v-if="orders.length">
              <Paginator :links="links" />
          </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import { computed } from '@vue/runtime-core';
  import Paginator from '@/views/components/paginator.vue';
  
  const props = defineProps({
      orders: Object,
  });
  
  const links = computed(() => props.orders.links);
  const orders = computed(() => props.orders.data);
  const countries = computed(() => props.countries);
  
  </script>
  
  <style>
  
  </style>
  