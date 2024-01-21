<template>
    <button @click="addStep()">Add</button>
    <div class="reminders">
        <div class="step" v-for="(reminder, index) in reminders">
            <Step :index="index" @update="getUpdate($event)"></Step>
        </div>
    </div>
    <button @click="save()">Save</button>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
import Step from '@/views/Step.vue'

export default defineComponent({
    name: "AddStep",
    components: {Step},
    data() {
        return {
            reminders: [
                {
                    entity: null,
                    frequency: null,
                    days: null,
                    isEnabled: false,
                    isDeleted: false,
                },
            ],
        };
    },
    methods: {
        addStep() {
            const step = {
                entity: null,
                frequency: null,
                days: null,
                isEnabled: false,
                isDeleted: false,
            };
            this.reminders.push(step);
        },

        getUpdate(evt: any) {
            this.reminders[evt.index] = {
                entity: evt.entity,
                frequency: evt.frequency,
                days: evt.days,
                isEnabled: false,
                isDeleted: false,
            }
        },

        save() {
            console.log(this.reminders)
        },
    },
});
</script>