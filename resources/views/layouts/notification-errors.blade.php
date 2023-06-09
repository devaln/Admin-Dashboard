{{-- Success Message --}}
@if ($message = Session::get('success'))
    <script>
        $(window).on('load', function() {
            //Welcome Message (not for login page)
            function notify(type) {
                $.growl({
                    message: '<strong>{{ $message }}</strong>'
                }, {
                    type: type,
                    allow_dismiss: true,
                    label: 'Cancel',
                    className: 'btn-xs btn-success',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    delay: 2500,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    }
                });
            };

            notify('success');
        });
    </script>

{{-- danger Message --}}
@elseif ($message = Session::get('danger'))
    <script>
    $(window).on('load', function() {
        //Welcome Message (not for login page)
        function notify(type) {
            $.growl({
                message: '<strong>{{ $message }}</strong>'
            }, {
                type: type,
                allow_dismiss: true,
                label: 'Cancel',
                className: 'btn-xs btn-danger',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 2500,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };

        notify('success');
    });
    </script>

{{-- Primary Message --}}
@elseif ($message = Session::get('primary'))
    <script>
        $(window).on('load', function() {
            //Welcome Message (not for login page)
            function notify(type) {
                $.growl({
                    message: '<strong>{{ $message }}</strong>'
                }, {
                    type: type,
                    allow_dismiss: true,
                    label: 'Cancel',
                    className: 'btn-xs btn-primary',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    delay: 2500,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    }
                });
            };

            notify('success');
        });
    </script>


{{-- Info Message --}}
@elseif ($message = Session::get('info'))
    <script>
    $(window).on('load', function() {
        //Welcome Message (not for login page)
        function notify(type) {
            $.growl({
                message: '<strong>{{ $message }}</strong>'
            }, {
                type: type,
                allow_dismiss: true,
                label: 'Cancel',
                className: 'btn-xs btn-info',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 2500,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };

        notify('success');
    });
    </script>


{{-- Inverse Message --}}
@elseif ($message = Session::get('inverse'))
    <script>
        $(window).on('load', function() {
            //Welcome Message (not for login page)
            function notify(type) {
                $.growl({
                    message: '<strong>{{ $message }}</strong>'
                }, {
                    type: type,
                    allow_dismiss: true,
                    label: 'Cancel',
                    className: 'btn-xs btn-inverse',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    delay: 2500,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    }
                });
            };

            notify('success');
        });
    </script>


{{-- secondary Message --}}
@elseif ($message = Session::get('secondary'))
    <script>
        $(window).on('load', function() {
            //Welcome Message (not for login page)
            function notify(type) {
                $.growl({
                    message: '<strong>{{ $message }}</strong>'
                }, {
                    type: type,
                    allow_dismiss: true,
                    label: 'Cancel',
                    className: 'btn-xs btn-secondary',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    delay: 2500,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    }
                });
            };

            notify('success');
        });
    </script>

{{-- secondary Message --}}
@elseif ($message = $errors->any())
    <script>
        $(window).on('load', function() {
            //Welcome Message (not for login page)
            function notify($message, type) {
                $.growl({
                    message: message
                }, {
                    type: type,
                    allow_dismiss: true,
                    label: 'Cancel',
                    className: 'btn-xs btn-success',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    delay: 2500,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    }
                });
            };

            notify($message, 'secondary');
        });
    </script>
@endif
