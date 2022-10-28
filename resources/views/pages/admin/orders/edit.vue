<template>
  <Head title="Edit Order" />
  <breadcrumb
    title="Edit Order"
    :crumbs="['Edit', 'Order']"
  />
  <div class="col-lg-8 m-auto">
    <div class="card shadow-lg radius-20">
      <div class="card-body">
        <form @submit.prevent="updateOrder">
          <div class="row mt-4">
          <FormGroup
            name="order_name"
            placeholder="Customer Name"
            label="Customer Name"
            v-model="form.order_name"
            class="col-md-6 col-sm-12" 
          />
          <FormSelectOption
            name="order_status"
            placeholder="Order Status"
            label="Order Status"
            v-model="form.order_status"
            class="col-md-6 col-sm-12" 
            :options="{ '':'Select Options', 'delivered': 'Delivered', 'in_transit': 'In Transit', 'pending':'Pending', 'not_collected': 'Not Collected' }"
          />
          <!--  additions -->
          <div v-if="form.order_status === 'in_transit'">
            <FormSelect class="offset-md-6 col-md-6 col-sm-12" 
            name="in_transit_country"
            placeholder="In Transit Location"
            label="In Transit Location"
            v-model="form.in_transit_country"
            :options="countries" 
          />
          </div>
          <div v-else-if="form.order_status === 'delivered'">
            <FormSelect class="offset-md-6 col-md-6 col-sm-12" 
            name="delivered_country"
            placeholder="Delivered Country"
            label="Delivered Country"
            v-model="form.delivered_country"
            :options="countries" 
          />
          </div>
          <div v-else-if="form.order_status === 'not_collected'">
            <FormSelect class="offset-md-6 col-md-6 col-sm-12" 
            name="not_collected_country"
            placeholder="Not Collected Country"
            label="Not Collected Country"
            v-model="form.not_collected_country"
            :options="countries" 
          />
          </div>
          <div v-else-if="form.order_status === 'pending'">
            <FormSelect class="offset-md-6 col-md-6 col-sm-12" 
            name="pending_country"
            placeholder="Pending Country"
            label="Pending Country"
            v-model="form.pending_country"
            :options="countries" 
          />
          </div>
          <div v-else></div>

          <!-- end additions -->
          <FormGroup
            name="order_notes"
            placeholder="Comment"
            label="Comment Notes"
            v-model="form.order_notes"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="pickup_date"
            placeholder="Pick Up Date"
            label="Pick Up Date"
            type="date"
            v-model="form.pickup_date"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="pickup_time"
            placeholder="Pickup Time"
            label="Pickup Time"
            type="time"
            v-model="form.pickup_time"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="delivery_date"
            placeholder="Delivery Date"
            label="Delivery Date"
            type="date"
            v-model="form.delivery_date"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="courier_diplomat"
            placeholder="Courier Diplomat"
            label="Courier Diplomat"
            v-model="form.courier_diplomat"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="destination"
            placeholder="Destination"
            label="Destination"
            v-model="form.destination"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="carrier_diplomat"
            placeholder="Carrier Diplomat"
            label="Carrier Diplomat"
            v-model="form.carrier_diplomat"
            class="col-md-6 col-sm-12" 
          />
          <FormSelect class="col-md-6 col-sm-12" 
            name="departed_country"
            placeholder="Departure Country"
            label="Departure Country"
            v-model="form.departed_country"
            :options="countries" 
          />
          <FormGroup
          class="col-md-6 col-sm-12"   
          name="departure_time"
            placeholder="Departure Time"
            label="Departure Time"
            type="time"
            v-model="form.departure_time"
          />
          <FormGroup
            class="col-md-6 col-sm-12" 
            name="shipper_name"
            placeholder="Shipper Name"
            label="Shipper Name"
            v-model="form.shipper_name"
          />
          <FormGroup
            class="col-md-6 col-sm-12" 
            name="origin"
            placeholder="Origin"
            label="Origin"
            v-model="form.origin"
          />
          <FormGroup
            class="col-md-6 col-sm-12" 
            name="carrier_ref_no"
            placeholder="Carrier Reference Number"
            label="Carrier Reference Number"
            v-model="form.carrier_ref_no"
          />
          <FormGroup
            class="col-md-6 col-sm-12" 
            name="consignee_name"
            placeholder="Consignee Name"
            label="Consignee Name"
            v-model="form.consignee_name"
          />
          
          <FormSelect class="col-md-6 col-sm-12" 
            name="shipper_country"
            placeholder="Shipper Country"
            label="Shipper Country"
            v-model="form.shipper_country"
            :options="countries" 
          />
          <FormSelect
            class="col-md-6 col-sm-12" 
            name="consignee_country"
            placeholder="Consignee Country"
            label="Consignee Country"
            v-model="form.consignee_country"
            :options="countries" 
          />
         
          <FormGroup
            name="shipper_num"
            placeholder="Shipper Number"
            label="Shipper Number"
            v-model="form.shipper_num"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="consignee_num"
            placeholder="Consignee Number"
            label="Consignee Number"
            v-model="form.consignee_num"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="type_of_shipment"
            placeholder="Type of Shipment"
            label="Type of Shipment"
            v-model="form.type_of_shipment"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="packages"
            placeholder="Packages"
            label="Packages"
            v-model="form.packages"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="product"
            placeholder="Products"
            label="Products"
            v-model="form.product"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="weight"
            placeholder="Weight"
            label="Weight"
            v-model="form.weight"
            class="col-md-6 col-sm-12" 
          />
          <FormSelect class="col-md-6 col-sm-12" 
            name="custom_clearance_country"
            placeholder="Custom Clearance Country"
            label="Custom Clearance Country"
            v-model="form.custom_clearance_country"
            :options="countries" 
          />
          <FormSelectOption
            name="custom_clearance_paid"
            placeholder="Custom Clearance Status"
            label="Custom Clearance Payment Status"
            v-model="form.custom_clearance_paid"
            class="col-md-6 col-sm-12" 
            :options="{ '':'Select Options', 'paid': 'Paid', 'unpaid': 'Not Paid' }"
          />
          <FormSelectOption
            name="custom_clearance_status"
            placeholder="Custom Clearance Status"
            label="Custom Clearance Status"
            v-model="form.custom_clearance_status"
            class="col-md-6 col-sm-12" 
            :options="{ '':'Select Options', 'cleared': 'Cleared', 'not_cleared': 'Not Cleared' }"
          />

          <FormGroup
            name="total_freight_amount"
            placeholder="Total Freight Amount"
            label="Total Freight Amount"
            v-model="form.total_freight_amount"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="quantity"
            placeholder="Quantity of Package"
            label="Quantity of Package"
            v-model="form.quantity"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="payment_mode"
            placeholder="Mode of Payment"
            label="Mode of Payment"
            v-model="form.payment_mode"
            class="col-md-6 col-sm-12" 
          />
          <FormGroup
            name="mode"
            placeholder="Mode of Freight"
            label="Mode of Freight"
            v-model="form.mode"
            class="col-md-6 col-sm-12" 
          />


          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary"
            :disabled="form.processing"
          >
            <ButtonLoader text="Create Order" :loading="form.processing" />
          </FormButton>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import { computed } from "@vue/runtime-core";
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import FormSelectOption from '@/views/components/form/FormSelectOption.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import InputGroup from '@/views/components/form/InputGroup.vue';
import { error } from '@/js/toast';

const props = defineProps({
    order: Object,
    countries: Object,
  })

  const form = useForm({
    order_name: props.order?.order_name || '',
    order_status: props.order?.order_status || '',
    order_notes: props.order?.order_notes ||'',
    pickup_time: props.order?.pickup_time ||'',
    pickup_date: props.order?.pickup_date || '',
    departure_time: props.order?.departure_time || '',
    delivery_date: props.order?.delivery_date || '',
    courier_diplomat: props.order?.courier_diplomat ||'',
    destination: props.order?.destination ||'',
    carrier_diplomat: props.order?.carrier_diplomat || '',
    shipper_name: props.order?.shipper_name || '',
    consignee_name: props.order?.consignee_name ||'',
    shipper_country: props.order?.shipper_country ||'',
    consignee_country: props.order?.consignee_country || '',
    shipper_num: props.order?.shipper_num || '',
    consignee_num: props.order?.consignee_num ||'',
    type_of_shipment: props.order?.type_of_shipment ||'',
    packages: props.order?.packages || '',
    product: props.order?.product || '',
    weight: props.order?.weight ||'',
    total_freight_amount: props.order?.total_freight_amount ||'',
    quantity: props.order?.quantity ||'',
    payment_mode: props.order?.payment_mode ||'',
    mode: props.order?.mode ||'',
    carrier_ref_no: props.order?.carrier_ref_no ||'',
    origin :props.order?.origin ||'',
    in_transit_country:props.order?.in_transit_country ||'',
    delivered_country:props.order?.delivered_country || '',
    not_collected_country:props.order?.not_collected_country ||'',
    pending_country:props.order?.pending_country ||'',
    departed_country:props.order?.departed_country ||'',
    custom_clearance_country:props.order?.custom_clearance_country ||'',
    custom_clearance_paid: props.order?.custom_clearance_paid ||'',
    custom_clearance_status:props.order?.custom_clearance_status ||'',
    
  });

  const countries = computed(() => props.countries);
  const updateOrder = (_) => {
    // console.log(form.data())
    form.put(route('admin.orders.update',props.order?.id));
  };
</script>

<style>
</style>
