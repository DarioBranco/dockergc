from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()


class battery_model(Base):
	__tablename__ = 'battery_model'
	id = Column(Integer, primary_key=True)
	MakeM = Column(Text)
	Type = Column(Text)
	Capacity = Column(Text)
	CEfficiency = Column(Text)
	DisCEfficiency = Column(Text)
	MaxCPower = Column(Text)
	MaxDisCPower = Column(Text)
	Cycle = Column(Text)
