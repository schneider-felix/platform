import template from './sw-first-run-wizard-paypal-credentials.html.twig';

const { Component } = Shopware;

Component.register('sw-first-run-wizard-paypal-credentials', {
    template,

    computed: {
        buttonConfig() {
            return [
                {
                    key: 'back',
                    label: this.$tc('sw-first-run-wizard.general.buttonBack'),
                    position: 'left',
                    variant: null,
                    action: 'sw.first.run.wizard.index.paypal.info',
                    disabled: false
                },
                {
                    key: 'skip',
                    label: this.$tc('sw-first-run-wizard.general.buttonSkip'),
                    position: 'right',
                    variant: null,
                    action: 'sw.first.run.wizard.index.plugins',
                    disabled: false
                },
                {
                    key: 'next',
                    label: this.$tc('sw-first-run-wizard.general.buttonNext'),
                    position: 'right',
                    variant: 'primary',
                    action: 'sw.first.run.wizard.index.plugins',
                    disabled: false
                }
            ];
        }
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.updateButtons();
        },

        updateButtons() {
            this.$emit('buttons-update', this.buttonConfig);
        }
    }
});
