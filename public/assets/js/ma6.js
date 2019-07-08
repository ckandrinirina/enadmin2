$(function () {

    SymfonyCollection = function () {
        var _this;
        var collection = {};
        var protoClass = randomString();
        
        collection.defaults = {
            label: 'Entry #',
            add: {
                'wrapper': 'button',
                'html': true,
                'content': 'Add',
                'attr': {
                    'type': 'button',
                    'class': 'btn btn-primary',
                },
            },
            up: {
                'wrapper': 'a',
                'html': true,
                'content': '<i class="fa fa-chevron-up fa-lg"></i>',
                'attr': {
                    'href': '#',
                    'type': 'button',
                    'class': 'up',
                    'data-toggle': 'tooltip',
                    'title': 'up',
                },
            },
            down: {
                'wrapper': 'a',
                'html': true,
                'content': '<i class="fa fa-chevron-down fa-lg"></i>',
                'attr': {
                    'href': '#',
                    'type': 'button',
                    'class': 'down',
                    'data-toggle': 'tooltip',
                    'title': 'down',
                },
            },
            remove: {
                'wrapper': 'button',
                'html': true,
                'content': '<span aria-hidden="true">&times;</span>',
                'attr': {
                    'class': 'app-close',
                    'aria-label': 'close',
                }
            },
            protoWrapper: 'div',
            addNav: false,
            allow_delete: true,
        };
        
        collection.test = function () {
        };
    
        collection.initElements = function () {
            _this.$elements = {
                container: $(_this.param.selector),
                addLink: _this.buildElement(_this.param.add),
            };
        };
    
        collection.initCollection = function () {
            _this.index = collection.$elements.container.children(_this.param.protoWrapper).length;
            if (_this.param.add.container) {
                _this.$elements.addLink.appendTo(_this.param.add.container);
            } else {
                _this.$elements.container.append(_this.$elements.addLink);
            }
            if (_this.index == 0) {
                _this.$elements.addLink.click();
            } else {
                _this.$elements.container.children(_this.param.protoWrapper).each(function() {
                    if (_this.param.allow_delete) {
                        _this.addDeleteLink($(this));
                    }
                    if (_this.param.add.callback) {
                        _this.param.add.callback($(this), true);
                    }
                });
            }
    
            _this.$elements.container.trigger('collection.init', []);
        }
    
        collection.bindElements = function () {
            _this.$elements.addLink.on('click', function (e) {
                e.preventDefault();
                _this.addEntry();
                if (_this.param.add.container) {
                    $(this).appendTo(_this.param.add.container);
                } else {
                    _this.$elements.container.append($(this));
                }
    
                return false;
            });
        }
    
        collection.addEntry = function (addOptions) {
            _this.$elements.container.trigger('collection.adding');
            var defaultPrototype = _this.param.prototype || _this.$elements.container.attr('data-prototype');
            addOptions = $.extend(true, {
                entryPrototype: defaultPrototype,
                method: 'append',
                container: _this.$elements.container,
                inversed: false,
                addNav: true,
            }, addOptions);
            var prototype = addOptions.entryPrototype;
            var $prototype = $(prototype.replace(/__name__label__/g, _this.param.label + (_this.index+1)).replace(/__name__/g, _this.index));
            _this.addDeleteLink($prototype, addOptions);
            if (addOptions.inversed)
                $prototype[addOptions.method].call($prototype, addOptions.container);
            else
                addOptions.container[addOptions.method].call(addOptions.container, $prototype);
            _this.index++;
            _this.$elements.container.trigger('collection.add', [$prototype]);
            if (_this.param.add.callback)
                _this.param.add.callback($prototype, false);
    
            return $prototype;
        }
    
        collection.addDeleteLink = function ($prototype, options) {
            if (!options) options = {addNav: true};
            $prototype.addClass(protoClass);
            var $deleteLink = _this.buildElement(_this.param.remove);
    
            if (_this.param.addNav && options.addNav)
                _this.addUpLink($prototype);
            if (_this.param.remove.container) {
                $prototype.find(_this.param.remove.container).append($deleteLink);
            } else {
                $prototype.append($deleteLink);
            }
            if (_this.param.addNav && options.addNav)
                _this.addDownLink($prototype);
            
            $deleteLink.click(function (e) {
                e.preventDefault();
                var remove = true;
                if (_this.param.remove.onRemove) {
                    confirm = _this.param.remove.onRemove($prototype);
                    if (typeof confirm == "boolean") {
                        if (confirm === true) {
                            executeRemove();
                        }
                    } else {				
                        $.when(confirm).then(function(OK, $cmodal) {
                            executeRemove();
                            if ($cmodal) {
                                $cmodal.modal('hide');
                            }
                        }, function(cancel) {
                        });
                    }
                } else {
                    executeRemove();
                }
                function executeRemove() {
                    $prototype.trigger('collection.remove', [$prototype]);
                    $prototype.remove();
                    _this.$elements.container.trigger('collection.remove', [_this.index]);
                    if (_this.param.remove.onRemoved) {
                        _this.param.remove.onRemoved();
                    }
                }
    
                return false;
            });
    
        }
    
        collection.addNav = function ($prototype) {
            var handler = function() {
                var row = $(this).parents('.'+protoClass);
                $prototype.trigger('collection.move', [$prototype]);
                if ($(this).is(".up")) {
                    row.insertBefore(row.prev());
                } else if ($(this).is(".down")) {
                    row.insertAfter(row.next());
                } else if ($(this).is(".top")) {
                    row.insertBefore($("table tr:first"));
                } else {
                    row.insertAfter($("table tr:last"));
                }
                $prototype.trigger('collection.moved', [$prototype]);
                _this.$elem.container.trigger('collection.moved', [$prototype]);
    
                return false;
              };
            var $up = _this.buildElement(_this.param.up);
            var $down = _this.buildElement(_this.param.down);
            $up.click(handler);
            $down.click(handler);
            _this.param.up.container ? $prototype.find(_this.param.up.container).append($up) : $prototype.append($up);
            _this.param.down.container ? $prototype.find(_this.param.down.container).append($down) : $prototype.append($down);
        }
    
        collection.addUpLink = function ($prototype) {
            var $up = _this.buildElement(_this.param.up);
            $up.click(function(e) {
                e.preventDefault();
                var move = true;
                var row = $(this).parents('.'+protoClass);
                if (_this.param.up.onMove) {
                    move = _this.param.up.onMove($prototype);
                }
                if (move) {
                    $prototype.trigger('collection.move', [$prototype]);
                    if (typeof move != "boolean") {
                        move.before(row);
                    } else {
                        row.insertBefore(row.prev());
                    }
                    if (_this.param.up.onMoved) {
                        _this.param.up.onMoved($prototype);
                    }
                    $prototype.trigger('collection.moved', [$prototype]);
                }
    
                return false;
              });
            _this.param.up.container ? $prototype.find(_this.param.up.container).append($up) : $prototype.append($up);
        }
    
        collection.addDownLink = function ($prototype) {
            var $down = _this.buildElement(_this.param.down);
            $down.click(function(e) {
                e.preventDefault();
                var move = true;
                var row = $(this).parents('.'+protoClass);
                if (_this.param.down.onMove) {
                    move = _this.param.down.onMove($prototype);
                }
                if (move) {        	
                    $prototype.trigger('collection.move', [$prototype]);
                    if (typeof move != "boolean") {
                        move.after(row);
                    } else {
                        row.insertAfter(row.next());
                    }
                    if (_this.param.down.onMoved) {
                        _this.param.down.onMoved($prototype);
                    }
                    $prototype.trigger('collection.moved', [$prototype]);
                }
    
                return false;
              });
            _this.param.down.container ? $prototype.find(_this.param.down.container).append($down) : $prototype.append($down);
        }
    
        function moveHandler () {
            var row = $(this).parents('.'+protoClass);
            if ($(this).is(".up")) {
                row.insertBefore(row.prev());
            } else if ($(this).is(".down")) {
                row.insertAfter(row.next());
            } else if ($(this).is(".top")) {
                row.insertBefore($("table tr:first"));
            }else {
                row.insertAfter($("table tr:last"));
            }
    
            return false;
        }
    
        function fixIndex () {
            var formName = _this.$elements.container.parents('form').attr('name');
            var pattern = new RegExp('^(' + formName + "\\[\\w*\\]\\[)(\\d+)(\\].*)");
            _this.$elements.container.find('.' + protoClass).each(function (index) {
                $(this).find('input, select').each(function () {
                    var name = $(this).attr('name');
                    name = name.replace(pattern, function (a, b, c, d) {
                        return b + index + d;
                    });
                    $(this).attr('name', name);
                });
            });
        } 
    
        collection.buildAttr = function (attrs) {
            var attributes = [];
            for (attr in attrs) {
                attributes.push(attr + '="' + attrs[attr] + '"');
            }
    
            return attributes.join(' ');
        }
    
        collection.buildElement = function (param) {
            return $('<' + param.wrapper + ' ' + _this.buildAttr(param.attr) + '>' + param.content + '</' + param.wrapper + '>');
        }
    
        collection.getProtoClass = function () {
            return protoClass;
        }
    
        collection.init = function (param) {
            _this = this;
            _this.param = jQuery.extend(true, _this.defaults, param);
            _this.initElements();
            _this.bindElements();
            _this.initCollection();
    
            return _this;
        }
    
        return collection;
    } ();
    
    })

    function randomString (length) {
        length = length||5;
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        var possibleStart = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    
        for(var i = 0; i < length; i++) {
            if (i == 0)
                text += possibleStart.charAt(Math.floor(Math.random() * possibleStart.length));
            else 
                text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
    
        return text;
    }