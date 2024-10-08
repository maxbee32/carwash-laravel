if (/Mobi/.test(navigator.userAgent)) {
    // if mobile device, use native pickers
    $(".date input").attr("type", "date");
    $(".time input").attr("type", "time");
  } else {
    // if desktop device, use DateTimePicker
    $("#datepicker").datetimepicker({
      useCurrent: false,
      format: "YYYY-MM-DD",
      showTodayButton: true,
      icons: {
        next: "fa fa-chevron-right",
        previous: "fa fa-chevron-left",
        today: 'todayText',
      }
    });
    $("#timepicker").datetimepicker({
      format: "HH:mm",
      icons: {
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down"
      }
    });
  }
