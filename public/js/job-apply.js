document.addEventListener("DOMContentLoaded", function () {
    function toggleSingleDetailsField(
        radioName,
        detailsDivId,
        detailsInputId,
        displayTriggerValue = "1"
    ) {
        const radios = document.querySelectorAll(`input[name="${radioName}"]`);
        const detailsDiv = document.getElementById(detailsDivId);
        const detailsInput = detailsInputId
            ? document.getElementById(detailsInputId)
            : null;

        // Helper function to set visibility and required status
        const setVisibility = (shouldShow) => {
            detailsDiv.style.display = shouldShow ? "block" : "none";
            if (detailsInput) {
                if (shouldShow) {
                    detailsInput.setAttribute("required", "required");
                } else {
                    detailsInput.removeAttribute("required");
                    detailsInput.value = ""; // Clear the value when hidden
                }
            }
        };

        radios.forEach((radio) => {
            radio.addEventListener("change", function () {
                setVisibility(this.value === displayTriggerValue);
            });
        });

        // Set initial state based on default selected radio (if any)
        const initialSelectedRadio = document.querySelector(
            `input[name="${radioName}"]:checked`
        );
        if (initialSelectedRadio) {
            setVisibility(initialSelectedRadio.value === displayTriggerValue);
        } else {
            // Default to hidden if no radio is initially selected
            setVisibility(false);
        }
    }

    // Function to handle toggling of 'related_details' based on multiple radio groups
    function setupRelatedDetailsLogic() {
        const workedUsRadios = document.querySelectorAll(
            'input[name="worked_with_us_before"]'
        );
        const appliedUsRadios = document.querySelectorAll(
            'input[name="applied_with_us_before"]'
        );
        const relatedToEmployeeRadios = document.querySelectorAll(
            'input[name="related_to_employee"]'
        );

        const relatedDetailsDiv = document.getElementById(
            "related_details_div"
        );
        const relatedDetailsInput = document.getElementById("related_details");

        function checkRelatedQuestions() {
            const workedUsYes =
                document.getElementById("worked_us_yes").checked;
            const appliedUsYes =
                document.getElementById("applied_us_yes").checked;
            const relatedYes = document.getElementById("related_yes").checked;

            // Show details div if any "Yes" radio is checked
            if (workedUsYes || appliedUsYes || relatedYes) {
                relatedDetailsDiv.style.display = "block";
                relatedDetailsInput.setAttribute("required", "required");
            } else {
                relatedDetailsDiv.style.display = "none";
                relatedDetailsInput.removeAttribute("required");
                relatedDetailsInput.value = "";
            }
        }

        // Add event listeners to all relevant radios
        workedUsRadios.forEach((radio) =>
            radio.addEventListener("change", checkRelatedQuestions)
        );
        appliedUsRadios.forEach((radio) =>
            radio.addEventListener("change", checkRelatedQuestions)
        );
        relatedToEmployeeRadios.forEach((radio) =>
            radio.addEventListener("change", checkRelatedQuestions)
        );

        // Set initial state
        checkRelatedQuestions();
    }

    // Function to handle toggling of 'conviction_details' based on multiple radio groups
    function setupConvictionDetailsLogic() {
        const disciplinaryActionRadios = document.querySelectorAll(
            'input[name="disciplinary_action_hm_forces"]'
        );
        const unspentConvictionsRadios = document.querySelectorAll(
            'input[name="unspent_convictions"]'
        );
        const spentConvictionsDiscloseRadios = document.querySelectorAll(
            'input[name="spent_convictions_disclose"]'
        );
        const pendingChargesRadios = document.querySelectorAll(
            'input[name="pending_charges"]'
        );
        const regulatoryInvestigationRadios = document.querySelectorAll(
            'input[name="regulatory_investigation"]'
        );
        const registrationConditionsRadios = document.querySelectorAll(
            'input[name="registration_conditions"]'
        );

        const convictionDetailsDiv = document.getElementById(
            "conviction_details_div"
        );
        const convictionDetailsInput =
            document.getElementById("conviction_details");

        function checkConvictionQuestions() {
            const disciplinaryActionYes = document.getElementById(
                "disciplinary_action_yes"
            ).checked;
            const unspentConvictionsYes = document.getElementById(
                "unspent_convictions_yes"
            ).checked;
            const spentConvictionsDiscloseYes = document.getElementById(
                "spent_convictions_disclose_yes"
            ).checked;
            const pendingChargesYes = document.getElementById(
                "pending_charges_yes"
            ).checked;
            const regulatoryInvestigationYes = document.getElementById(
                "regulatory_investigation_yes"
            ).checked;
            const registrationConditionsYes = document.getElementById(
                "registration_conditions_yes"
            ).checked;

            // Show details div if any "Yes" radio is checked
            if (
                disciplinaryActionYes ||
                unspentConvictionsYes ||
                spentConvictionsDiscloseYes ||
                pendingChargesYes ||
                regulatoryInvestigationYes ||
                registrationConditionsYes
            ) {
                convictionDetailsDiv.style.display = "block";
                convictionDetailsInput.setAttribute("required", "required");
            } else {
                convictionDetailsDiv.style.display = "none";
                convictionDetailsInput.removeAttribute("required");
                convictionDetailsInput.value = "";
            }
        }

        // Add event listeners to all relevant radios
        disciplinaryActionRadios.forEach((radio) =>
            radio.addEventListener("change", checkConvictionQuestions)
        );
        unspentConvictionsRadios.forEach((radio) =>
            radio.addEventListener("change", checkConvictionQuestions)
        );
        spentConvictionsDiscloseRadios.forEach((radio) =>
            radio.addEventListener("change", checkConvictionQuestions)
        );
        pendingChargesRadios.forEach((radio) =>
            radio.addEventListener("change", checkConvictionQuestions)
        );
        regulatoryInvestigationRadios.forEach((radio) =>
            radio.addEventListener("change", checkConvictionQuestions)
        );
        registrationConditionsRadios.forEach((radio) =>
            radio.addEventListener("change", checkConvictionQuestions)
        );

        // Set initial state
        checkConvictionQuestions();
    }

    // Apply toggle functions for single radio groups
    toggleSingleDetailsField(
        "requires_adjustments",
        "adjustment_details_div",
        "adjustment_details",
        "1"
    );
    toggleSingleDetailsField(
        "professional_body_member",
        "professional_registration_details_div",
        "prof_reg_name",
        "1"
    );
    toggleSingleDetailsField(
        "registration_revoked",
        "registration_revoked_details_div",
        "revocation_details",
        "1"
    );
    toggleSingleDetailsField(
        "currently_employed",
        "not_currently_employed_details_div",
        "not_employed_details",
        "0"
    );
    toggleSingleDetailsField(
        "is_only_job",
        "not_only_job_details_div",
        "other_jobs_details",
        "0"
    );
    toggleSingleDetailsField(
        "endorsements",
        "endorsement_details_div",
        "endorsement_details",
        "1"
    );

    // Apply logic for multi-radio group dependencies
    setupRelatedDetailsLogic();
    setupConvictionDetailsLogic();

    // Educational History Dynamic Fields
    let educationEntryCount = 0;
    const educationalHistoryContainer = document.getElementById(
        "educational_history_container"
    );
    const addEducationBtn = document.getElementById("add_education_btn");
    const educationEntryTemplate = document.getElementById(
        "education_entry_template"
    );

    function addEducationEntry() {
        const clone = educationEntryTemplate.content.cloneNode(true);
        const entryDiv = clone.querySelector(".education-entry");

        // Update names and IDs with unique index
        entryDiv.querySelectorAll('[name*="[INDEX]"]').forEach((input) => {
            input.name = input.name.replace(
                "[INDEX]",
                `[${educationEntryCount}]`
            );
        });
        entryDiv.querySelectorAll('[id*="_INDEX"]').forEach((input) => {
            input.id = input.id.replace("_INDEX", `_${educationEntryCount}`);
        });
        entryDiv.querySelectorAll('label[for*="_INDEX"]').forEach((label) => {
            label.setAttribute(
                "for",
                label
                    .getAttribute("for")
                    .replace("_INDEX", `_${educationEntryCount}`)
            );
        });

        educationalHistoryContainer.appendChild(entryDiv);
        educationEntryCount++;

        // Add event listener to the remove button
        entryDiv
            .querySelector(".remove-education-btn")
            .addEventListener("click", function () {
                entryDiv.remove();
            });
    }

    // Add the first education entry on page load
    addEducationEntry();

    // Add new entry when button is clicked
    addEducationBtn.addEventListener("click", addEducationEntry);
});
