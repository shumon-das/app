<template>
    <div class="reminder-step">
        <div class="formgrid grid">
            <div class="field col-12 md:col-3">
                <label for="state">Entity</label>
                <select 
                    class="w-full text-base text-color surface-overlay p-2 border-1 border-solid surface-border border-round outline-none focus:border-primary"
                    style="appearance: auto"
                    v-model="entity"
                    @change="emiting()"
                >
                    <option>Entity 1</option>
                    <option>Entity 2</option>
                    <option>Entity 3</option>
                    <option>Entity 4</option>
                    <option>Entity 4</option>
                </select>
            </div>
            <div class="field col-12 md:col-3">
                <label for="state">Frequency</label>
                <select 
                    class="w-full text-base text-color surface-overlay p-2 border-1 border-solid surface-border border-round outline-none focus:border-primary"
                    style="appearance: auto"
                    v-model="frequency"
                    @change="emiting()"
                >
                    <option>Daily</option>
                    <option>Weekly</option>
                    <option>Monthly</option>
                    <option>6 Weekly</option>
                    <option>Quarterly</option>
                </select>
            </div>
            <div class="field col-12 md:col-3">
                <label for="firstname2">Days</label>
                <input 
                    type="number" 
                    class="text-base text-color surface-overlay p-2 border-1 border-solid surface-border border-round appearance-none outline-none focus:border-primary w-full"
                    v-model="days"
                    @change="emiting()"
                >
            </div>
            <div class="field col-12 md:col-3">
                <button>Delete</button>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: "Step",
    emits: ["update"],
    props: {
        index: { type: Number, required: true },
    },
    data() {
        return {
            entity: null,
            frequency: null,
            days: null,
        };
    },
    methods: {
        emiting() {
            this.$emit("update", {
                index: this.index,
                entity: this.entity,
                frequency: this.frequency,
                days: this.days,
            })
        }
    },
});
</script>