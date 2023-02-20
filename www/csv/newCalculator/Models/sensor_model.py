from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class sensor_model(Base):
	__tablename__ = 'sensor_model'
	id = Column(Integer, primary_key=True)
	MakeM = Column(Text)
	MaxRes = Column(Text)
	Type = Column(Text)
