var User = function(name, age) {
  this.name = 'a';
  this.age = age;
}

User.prototype.getName = function() {
  console.log(this.name)
  return this.name;
}
