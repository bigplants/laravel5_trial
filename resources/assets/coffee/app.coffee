test = (x) -> x * x

$('h1').hover ->
  $(@).stop().animate 'opacity': '0.5'
, ->
  $(@).stop().animate 'opacity': '1'


class Animal
  constructor: (@name) ->

  move: (meters) ->
    alert @name + " moved #{meters}m."


class Snake extends Animal
  move: ->
    alert "aaa"
    super 5


sam = new Snake "Sammy the Python"
#sam.move()



