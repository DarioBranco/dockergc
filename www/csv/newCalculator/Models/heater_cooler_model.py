from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class heater_cooler_model(Base):
	__tablename__ = 'heater_cooler_model'
	id = Column(Integer, primary_key=True)
	MakeM = Column(Text)
	Type = Column(Text)
	PowerLevel = Column(Text)
