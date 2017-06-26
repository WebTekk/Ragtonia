app = {};
if (!app.about) {
    app.about = {};
}

app.about.Index = function () {

    /** @var app.about.Index */
    var $this = this;

    this.box = null;

    /**
     * Initial function
     */
    this.init = function () {
        $this.box = $('#content-box');
        $this.registerEvents();
    };

    /**
     * Register button events.
     */
    this.registerEvents = function () {
        $this.box.find("[data-name=government-form]").on("click", $this.governmentFormOnClick);
        $this.box.find("[data-name=military]").on("click", $this.militaryOnClick);
        $this.box.find("[data-name=government]").on("click", $this.governmentOnClick);
        $this.box.find("[data-name=history]").on("click", $this.historyOnClick);
        $this.box.find("[data-name=toggle-ground-team]").on("click", $this.groundTeamOnClick);
        $this.box.find("[data-name=toggle-air-support]").on("click", $this.airSupportOnClick);
        $this.box.find("[data-name=toggle-superordinate]").on("click", $this.superordinateOnClick);
        $this.box.find("[data-name=toggle-legend-of-ragnaron]").on("click", $this.legendOfRagnaronOnClick);
        $this.box.find("[data-name=info]").on("click", $this.infoOnClick);
    };

    this.governmentFormOnClick = function () {
        $this.hideAll();
        $this.box.find("[data-name=government-form-content]").removeClass("hidden");
    };

    this.militaryOnClick = function () {
        $this.hideAll();
        $this.box.find("[data-name=military-content]").removeClass("hidden");
    };

    this.governmentOnClick = function () {
        $this.hideAll();
        $this.box.find("[data-name=government-content]").removeClass("hidden");
    };

    this.historyOnClick = function () {
        $this.hideAll();
        $this.box.find("[data-name=history-content]").removeClass("hidden");
    };

    this.hideAll = function () {
        $this.box.find("[data-content=single]").addClass("hidden");
    };

    this.groundTeamOnClick = function () {
        var box = $this.box.find("[data-name=ground-team]");
        if (box.hasClass("hidden")) {
            box.removeClass("hidden");
        } else {
            box.addClass("hidden");
        }
    };

    this.airSupportOnClick = function () {
        var box = $this.box.find("[data-name=air-support]");
        if (box.hasClass("hidden")) {
            box.removeClass("hidden");
        } else {
            box.addClass("hidden");
        }
    };

    this.superordinateOnClick = function () {
        var box = $this.box.find("[data-name=superordinate]");
        if (box.hasClass("hidden")) {
            box.removeClass("hidden");
        } else {
            box.addClass("hidden");
        }
    };

    this.legendOfRagnaronOnClick = function () {
        var box = $this.box.find("[data-name=legend-of-ragnaron]");
        if (box.hasClass("hidden")) {
            box.removeClass("hidden");
        } else {
            box.addClass("hidden");
        }
    };

    this.infoOnClick = function (event) {
        event.preventDefault();
        var field = $(this).data('id');
        var box = $this.box.find("[data-name=" + field + "-info]");
        if (box.hasClass("hidden")) {
            box.removeClass("hidden");
        } else {
            box.addClass("hidden");
        }
    };

    this.init();
};

/**
 * Start JavaScript when document is ready.
 */
$(function () {
    new app.about.Index();
});